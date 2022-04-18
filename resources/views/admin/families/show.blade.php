@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.family.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.id') }}
                        </th>
                        <td>
                            {{ $family->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.ledenid') }}
                        </th>
                        <td>
                            {{ $family->ledenid->ledenid ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.family_member_type') }}
                        </th>
                        <td>
                            {{ App\Models\Family::FAMILY_MEMBER_TYPE_SELECT[$family->family_member_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.first_name') }}
                        </th>
                        <td>
                            {{ $family->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.surname') }}
                        </th>
                        <td>
                            {{ $family->surname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.d_o_b') }}
                        </th>
                        <td>
                            {{ $family->d_o_b }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Family::GENDER_RADIO[$family->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Family::STATUS_RADIO[$family->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.photo') }}
                        </th>
                        <td>
                            @if($family->photo)
                                <a href="{{ $family->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $family->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.registration_date') }}
                        </th>
                        <td>
                            {{ $family->registration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.birthplace') }}
                        </th>
                        <td>
                            {{ $family->birthplace }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.history_almere') }}
                        </th>
                        <td>
                            {{ App\Models\Family::HISTORY_ALMERE_SELECT[$family->history_almere] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection