@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.family.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.families.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ledenid_id">{{ trans('cruds.family.fields.ledenid') }}</label>
                <select class="form-control select2 {{ $errors->has('ledenid') ? 'is-invalid' : '' }}" name="ledenid_id" id="ledenid_id">
                    @foreach($ledenids as $id => $entry)
                        <option value="{{ $id }}" {{ old('ledenid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ledenid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ledenid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.ledenid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.family.fields.family_member_type') }}</label>
                <select class="form-control {{ $errors->has('family_member_type') ? 'is-invalid' : '' }}" name="family_member_type" id="family_member_type" required>
                    <option value disabled {{ old('family_member_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Family::FAMILY_MEMBER_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('family_member_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('family_member_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('family_member_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.family_member_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.family.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="surname">{{ trans('cruds.family.fields.surname') }}</label>
                <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', '') }}">
                @if($errors->has('surname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('surname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.surname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="d_o_b">{{ trans('cruds.family.fields.d_o_b') }}</label>
                <input class="form-control date {{ $errors->has('d_o_b') ? 'is-invalid' : '' }}" type="text" name="d_o_b" id="d_o_b" value="{{ old('d_o_b') }}">
                @if($errors->has('d_o_b'))
                    <div class="invalid-feedback">
                        {{ $errors->first('d_o_b') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.d_o_b_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.family.fields.gender') }}</label>
                @foreach(App\Models\Family::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.family.fields.status') }}</label>
                @foreach(App\Models\Family::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.family.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birthplace">{{ trans('cruds.family.fields.birthplace') }}</label>
                <input class="form-control {{ $errors->has('birthplace') ? 'is-invalid' : '' }}" type="text" name="birthplace" id="birthplace" value="{{ old('birthplace', '') }}">
                @if($errors->has('birthplace'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birthplace') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.birthplace_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.family.fields.history_almere') }}</label>
                <select class="form-control {{ $errors->has('history_almere') ? 'is-invalid' : '' }}" name="history_almere" id="history_almere">
                    <option value disabled {{ old('history_almere', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Family::HISTORY_ALMERE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('history_almere', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('history_almere'))
                    <div class="invalid-feedback">
                        {{ $errors->first('history_almere') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.family.fields.history_almere_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.families.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($family) && $family->photo)
      var file = {!! json_encode($family->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection