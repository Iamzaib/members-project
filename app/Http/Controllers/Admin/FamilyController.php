<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFamilyRequest;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Models\Family;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FamilyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Family::with(['ledenid'])->select(sprintf('%s.*', (new Family())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'family_show';
                $editGate = 'family_edit';
                $deleteGate = 'family_delete';
                $crudRoutePart = 'families';

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
            $table->addColumn('ledenid_ledenid', function ($row) {
                return $row->ledenid ? $row->ledenid->ledenid : '';
            });

            $table->editColumn('ledenid.first_name', function ($row) {
                return $row->ledenid ? (is_string($row->ledenid) ? $row->ledenid : $row->ledenid->first_name) : '';
            });
            $table->editColumn('family_member_type', function ($row) {
                return $row->family_member_type ? Family::FAMILY_MEMBER_TYPE_SELECT[$row->family_member_type] : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Family::STATUS_RADIO[$row->status] : '';
            });
            $table->editColumn('registration_date', function ($row) {
                return $row->registration_date ? $row->registration_date : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'ledenid']);

            return $table->make(true);
        }

        $members = Member::get();

        return view('admin.families.index', compact('members'));
    }

    public function create()
    {
        abort_if(Gate::denies('family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ledenids = Member::pluck('ledenid', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.families.create', compact('ledenids'));
    }

    public function store(StoreFamilyRequest $request)
    {
        $family = Family::create($request->all());

        if ($request->input('photo', false)) {
            $family->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $family->id]);
        }

        return redirect()->route('admin.families.index');
    }

    public function edit(Family $family)
    {
        abort_if(Gate::denies('family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ledenids = Member::pluck('ledenid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $family->load('ledenid');

        return view('admin.families.edit', compact('family', 'ledenids'));
    }

    public function update(UpdateFamilyRequest $request, Family $family)
    {
        $family->update($request->all());

        if ($request->input('photo', false)) {
            if (!$family->photo || $request->input('photo') !== $family->photo->file_name) {
                if ($family->photo) {
                    $family->photo->delete();
                }
                $family->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($family->photo) {
            $family->photo->delete();
        }

        return redirect()->route('admin.families.index');
    }

    public function show(Family $family)
    {
        abort_if(Gate::denies('family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $family->load('ledenid');

        return view('admin.families.show', compact('family'));
    }

    public function destroy(Family $family)
    {
        abort_if(Gate::denies('family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $family->delete();

        return back();
    }

    public function massDestroy(MassDestroyFamilyRequest $request)
    {
        Family::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('family_create') && Gate::denies('family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Family();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
