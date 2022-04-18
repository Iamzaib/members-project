@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mandaat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mandaats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.id') }}
                        </th>
                        <td>
                            {{ $mandaat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.ledenid') }}
                        </th>
                        <td>
                            {{ $mandaat->ledenid->ledenid ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Mandaat::STATUS_SELECT[$mandaat->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.mandaadnr') }}
                        </th>
                        <td>
                            {{ $mandaat->mandaadnr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.start_mandaat') }}
                        </th>
                        <td>
                            {{ $mandaat->start_mandaat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mandaat.fields.einde_mandaat') }}
                        </th>
                        <td>
                            {{ $mandaat->einde_mandaat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mandaats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection