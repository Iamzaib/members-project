@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mandaat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mandaats.update", [$mandaat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ledenid_id">{{ trans('cruds.mandaat.fields.ledenid') }}</label>
                <select class="form-control select2 {{ $errors->has('ledenid') ? 'is-invalid' : '' }}" name="ledenid_id" id="ledenid_id" required>
                    @foreach($ledenids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ledenid_id') ? old('ledenid_id') : $mandaat->ledenid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ledenid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ledenid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mandaat.fields.ledenid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.mandaat.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Mandaat::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $mandaat->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mandaat.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mandaadnr">{{ trans('cruds.mandaat.fields.mandaadnr') }}</label>
                <input class="form-control {{ $errors->has('mandaadnr') ? 'is-invalid' : '' }}" type="text" name="mandaadnr" id="mandaadnr" value="{{ old('mandaadnr', $mandaat->mandaadnr) }}">
                @if($errors->has('mandaadnr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mandaadnr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mandaat.fields.mandaadnr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_mandaat">{{ trans('cruds.mandaat.fields.start_mandaat') }}</label>
                <input class="form-control date {{ $errors->has('start_mandaat') ? 'is-invalid' : '' }}" type="text" name="start_mandaat" id="start_mandaat" value="{{ old('start_mandaat', $mandaat->start_mandaat) }}">
                @if($errors->has('start_mandaat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_mandaat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mandaat.fields.start_mandaat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="einde_mandaat">{{ trans('cruds.mandaat.fields.einde_mandaat') }}</label>
                <input class="form-control date {{ $errors->has('einde_mandaat') ? 'is-invalid' : '' }}" type="text" name="einde_mandaat" id="einde_mandaat" value="{{ old('einde_mandaat', $mandaat->einde_mandaat) }}">
                @if($errors->has('einde_mandaat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('einde_mandaat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mandaat.fields.einde_mandaat_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection