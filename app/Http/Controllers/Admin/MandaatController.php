<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMandaatRequest;
use App\Http\Requests\StoreMandaatRequest;
use App\Http\Requests\UpdateMandaatRequest;
use App\Models\Mandaat;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MandaatController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mandaat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Mandaat::with(['ledenid'])->select(sprintf('%s.*', (new Mandaat())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mandaat_show';
                $editGate = 'mandaat_edit';
                $deleteGate = 'mandaat_delete';
                $crudRoutePart = 'mandaats';

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
            $table->editColumn('mandaadnr', function ($row) {
                return $row->mandaadnr ? $row->mandaadnr : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'ledenid']);

            return $table->make(true);
        }

        $members = Member::get();

        return view('admin.mandaats.index', compact('members'));
    }

    public function create()
    {
        abort_if(Gate::denies('mandaat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ledenids = Member::pluck('ledenid', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mandaats.create', compact('ledenids'));
    }

    public function store(StoreMandaatRequest $request)
    {
        $mandaat = Mandaat::create($request->all());

        return redirect()->route('admin.mandaats.index');
    }

    public function edit(Mandaat $mandaat)
    {
        abort_if(Gate::denies('mandaat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ledenids = Member::pluck('ledenid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mandaat->load('ledenid');

        return view('admin.mandaats.edit', compact('ledenids', 'mandaat'));
    }

    public function update(UpdateMandaatRequest $request, Mandaat $mandaat)
    {
        $mandaat->update($request->all());

        return redirect()->route('admin.mandaats.index');
    }

    public function show(Mandaat $mandaat)
    {
        abort_if(Gate::denies('mandaat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mandaat->load('ledenid');

        return view('admin.mandaats.show', compact('mandaat'));
    }

    public function destroy(Mandaat $mandaat)
    {
        abort_if(Gate::denies('mandaat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mandaat->delete();

        return back();
    }

    public function massDestroy(MassDestroyMandaatRequest $request)
    {
        Mandaat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
