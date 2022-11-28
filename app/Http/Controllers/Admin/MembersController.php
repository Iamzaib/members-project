<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberPublicRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Mail\VerifyMailMember;
use App\Models\Member;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;

class MembersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Member::query()->select(sprintf('%s.*', (new Member())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('print_pdf', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'member_show';
                $editGate = 'member_edit';
                $deleteGate = 'member_delete';
                $crudRoutePart = 'members';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('ledenid', function ($row) {
                return $row->ledenid ? $row->ledenid : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Member::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            /*$table->editColumn('house_number', function ($row) {
                return $row->house_number ? $row->house_number : '';
            });*/
            $table->editColumn('email_checked', function ($row) {
                return $row->email_checked!=1 ? sprintf('<a href="%s" class="btn btn-xs btn-info">Resend Email</a>',route('admin.members.resend_email',$row->id)) : 'Email Verified';
            });
            $table->editColumn('print_pdf', function ($row) {
                return sprintf('<a href="%s" class="btn btn-xs btn-primary" target="_blank">Print Details</a>',route('admin.members.print_details',$row->id));
            });
            $table->editColumn('photograph', function ($row) {
                if ($photo = $row->photograph) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photograph','email_checked','print_pdf']);

            return $table->make(true);
        }

        return view('admin.members.index');
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_max=$this->ledenid_gen();
        return view('admin.members.create',array('ledenid'=>$member_max));
    }
    public function signUpCreate()
    {
       // abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('member-create');
    }
    private function ledenid_gen(){
        $member_max=DB::table('members')->max('ledenid');
        if($member_max){
            $member_max=explode('-',$member_max);
            $member_max[0]=date('Y');
            $member_max[1]=(int)$member_max[1]+1;
            $member_max[1] = str_pad($member_max[1], 4, '0', STR_PAD_LEFT);
            return implode('-', $member_max);
        }
        return date('Y').'-0001';
    }
    public function store(StoreMemberRequest $request)
    {
        $member_max=$this->ledenid_gen();
        $request->merge(['ledenid' => $member_max]);
        $member = Member::create($request->all());

        if ($request->input('photograph', false)) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('photograph'))))->toMediaCollection('photograph');
        }

        if ($request->input('signed_document', false)) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('signed_document'))))->toMediaCollection('signed_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $member->id]);
        }
        $verifyUser = VerifyUser::create([
            'member_id' => $member->id,
            'token' => sha1(time())
        ]);
        \Mail::to($member->enamel)->send(new VerifyMailMember($member));
        return redirect()->route('admin.members.index');
    }
    public function SignUpStore(StoreMemberPublicRequest $request)
    {
        $member_max=$this->ledenid_gen();
        $request->merge(['ledenid' => $member_max]);
        $member = Member::create($request->all());

        if ($request->input('photograph', false)) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('photograph'))))->toMediaCollection('photograph');
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $member->id]);
        }
        $verifyUser = VerifyUser::create([
            'member_id' => $member->id,
            'token' => sha1(time())
        ]);
        Mail::to($member->enamel)->send(new VerifyMailMember($member));
        //$status = "Your Registration is completed please check your email to verify. Thank You";
        $status = "Uw registratie is voltooid, controleer uw e-mail om te verifiëren. ";
        return view('thank-you',['status'=> $status]);
//        return redirect()->route('admin.members.index');
    }

    public function edit(Member $member)
    {

        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        if ($request->input('photograph', false)) {
            if (!$member->photograph || $request->input('photograph') !== $member->photograph->file_name) {
                if ($member->photograph) {
                    $member->photograph->delete();
                }
                $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('photograph'))))->toMediaCollection('photograph');
            }
        } elseif ($member->photograph) {
            $member->photograph->delete();
        }

        if ($request->input('signed_document', false)) {
            if (!$member->signed_document || $request->input('signed_document') !== $member->signed_document->file_name) {
                if ($member->signed_document) {
                    $member->signed_document->delete();
                }
                $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('signed_document'))))->toMediaCollection('signed_document');
            }
        } elseif ($member->signed_document) {
            $member->signed_document->delete();
        }

        return redirect()->route('admin.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('member_create') && Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Member();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->email_checked) {
                $verifyUser->user->email_checked = 1;
                $verifyUser->user->email_verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                $verifyUser->user->save();
                $status = "Bedankt Uw e-mailadres is geverifieerd.";
            } else {
                $status = "Bedankt Uw e-mailadres is al geverifieerd. ";
            }
        } else {
            return view('thank-you',['warning'=> "Sorry, uw e-mailadres kan niet worden geïdentificeerd. "]);
            //return redirect()->route('member_verify_response')->with('warning', "Sorry your email cannot be identified.");
        }
        return view('thank-you',['status'=> $status]);
        //return redirect()->route('member_verify_response')->with('status', $status);
    }
    public function resend_email(Request $request){
        //dd();$request->id
        $member=Member::find($request->id);
        $verifyUser=VerifyUser::where('member_id' , $member->id)->first();
        if($verifyUser!==null){
            $verifyUser = VerifyUser::where('member_id' , $member->id)->update(
                ['token' => sha1(time())]
            );
        }else{
            $verifyUser=VerifyUser::create([
                'member_id' => $member->id,
                'token' => sha1(time())
            ]);
        }

        Mail::to($member->enamel)->send(new VerifyMailMember($member));
        return redirect()->route('admin.members.index')->with('status','E-mail verzonden naar donateur.');
    }
    public function print_details(Request $request){
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $member=Member::find($request->id);
        $member->print=true;
//       print_r($member);exit;
        $pdf = PDF::loadView('admin.members.print', array('member'=>$member));
        return $pdf->stream($member->first_name.'-'.$member->ledenid.'-Details.pdf');
    }
}
