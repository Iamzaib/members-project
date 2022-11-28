    <style>
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid;
            border-top-color: currentcolor;
            border-right-color: currentcolor;
            border-bottom-color: currentcolor;
            border-left-color: currentcolor;
            border-color: #d8dbe0;
            text-align: left;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #4f5d73;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        table {
            border-collapse: collapse;
        }
        table th{
            text-align: left;
        }
        table {
            border-collapse: collapse;
        }
        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: rgba(0,0,21,.05);
        }
        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: rgba(0,0,0,.05);
        }
    </style>
<div class="card">
    <div class="card-header">

        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    <img src="https://campusbadr.nl/wp-content/uploads/2022/02/campusbadrlogo_transparant_bruin_2.png" alt="" style="width:300px ">
                </th>
                <th align="left">
                    <h2 style="text-align: center">Donateurs Formulier</h2>
                    <br>
                    van<br>
                    {{$member->first_name}} {{ $member->surname }}
                </th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="form-group">
            @if(isset($member->print)&&$member->print===false)
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            @endif
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.ledenid') }}
                        </th>
                        <td>
                            {{ $member->ledenid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Member::STATUS_SELECT[$member->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.type_of_donor') }}
                        </th>
                        <td>
                            {{ App\Models\Member::TYPE_OF_DONOR_SELECT[$member->type_of_donor] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.first_name') }}
                        </th>
                        <td>
                            {{ $member->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.surname') }}
                        </th>
                        <td>
                            {{ $member->surname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.street_name') }}
                        </th>
                        <td>
                            {{ $member->street_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.house_number') }}
                        </th>
                        <td>
                            {{ $member->house_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.zip_code') }}
                        </th>
                        <td>
                            {{ $member->zip_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.town') }}
                        </th>
                        <td>
                            {{ $member->town }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.land') }}
                        </th>
                        <td>
                            {{ $member->land }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.enamel') }}
                        </th>
                        <td>
                            {{ $member->enamel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.email_checked') }}
                        </th>
                        <td>
                            {{ $member->email_checked }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $member->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Member::GENDER_RADIO[$member->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.photograph') }}
                        </th>
                        <td>
                            @if($member->photograph)
                                <a href="{{ $member->photograph->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $member->photograph->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.birthplace') }}
                        </th>
                        <td>
                            {{ $member->birthplace }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.unsubscribe_date') }}
                        </th>
                        <td>
                            {{ $member->unsubscribe_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.remark') }}
                        </th>
                        <td>
                            {{ $member->remark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.iban') }}
                        </th>
                        <td>
                            {{ $member->iban }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.amount') }}
                        </th>
                        <td>
                            {{ $member->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 40px 0;">
                            {{ trans('cruds.member.fields.signed_document') }}
                        </th>
                        <td style="padding: 40px 0;">
                            @if($member->signed_document)
                                <a href="{{ $member->signed_document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
                @if(isset($member->print)&&$member->print===false)
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
