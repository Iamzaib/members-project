<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

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
            $table->editColumn('house_number', function ($row) {
                return $row->house_number ? $row->house_number : '';
            });
            $table->editColumn('zip_code', function ($row) {
                return $row->zip_code ? $row->zip_code : '';
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

            $table->rawColumns(['actions', 'placeholder', 'photograph']);

            return $table->make(true);
        }

        return view('admin.members.index');
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members.create');
    }

    public function store(StoreMemberRequest $request)
    {
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

        return redirect()->route('admin.members.index');
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
}
