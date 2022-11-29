@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="text-center">Ledenregistratie</h2>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("members.SignUpStore") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
{{--                    <div class="form-group">--}}
{{--                        <label class="required" for="ledenid">{{ trans('cruds.member.fields.ledenid') }}</label>--}}
{{--                        <input class="form-control {{ $errors->has('ledenid') ? 'is-invalid' : '' }}" type="text" name="ledenid" id="ledenid" value="{{ old('ledenid', '') }}" required>--}}
{{--                        @if($errors->has('ledenid'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('ledenid') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.member.fields.ledenid_helper') }}</span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="required">{{ trans('cruds.member.fields.status') }}</label>--}}
{{--                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>--}}
{{--                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
{{--                            @foreach(App\Models\Member::STATUS_SELECT as $key => $label)--}}
{{--                                <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @if($errors->has('status'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.member.fields.status_helper') }}</span>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label>{{ trans('cruds.member.fields.type_of_donor') }}</label>
                        <select class="form-control {{ $errors->has('type_of_donor') ? 'is-invalid' : '' }}" name="type_of_donor" id="type_of_donor" onchange="showTerms(this.value)">
                            <option value disabled {{ old('type_of_donor', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Member::TYPE_OF_DONOR_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('type_of_donor', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('type_of_donor'))
                            <div class="invalid-feedback">
                                {{ $errors->first('type_of_donor') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.type_of_donor_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="first_name">{{ trans('cruds.member.fields.first_name') }}</label>
                        <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                        @if($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.first_name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="surname">{{ trans('cruds.member.fields.surname') }}</label>
                        <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', '') }}">
                        @if($errors->has('surname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('surname') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.surname_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="street_name">{{ trans('cruds.member.fields.street_name') }}</label>
                        <input class="form-control {{ $errors->has('street_name') ? 'is-invalid' : '' }}" type="text" name="street_name" id="street_name" value="{{ old('street_name', '') }}" required>
                        @if($errors->has('street_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('street_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.street_name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="house_number">{{ trans('cruds.member.fields.house_number') }}</label>
                        <input class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}" type="text" name="house_number" id="house_number" value="{{ old('house_number', '') }}">
                        @if($errors->has('house_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('house_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.house_number_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="zip_code">{{ trans('cruds.member.fields.zip_code') }}</label>
                        <input class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', '') }}" required>
                        @if($errors->has('zip_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('zip_code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.zip_code_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="town">{{ trans('cruds.member.fields.town') }}</label>
                        <input class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" type="text" name="town" id="town" value="{{ old('town', '') }}">
                        @if($errors->has('town'))
                            <div class="invalid-feedback">
                                {{ $errors->first('town') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.town_helper') }}</span>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="land">{{ trans('cruds.member.fields.land') }}</label>--}}
{{--                        <input class="form-control {{ $errors->has('land') ? 'is-invalid' : '' }}" type="text" name="land" id="land" value="{{ old('land', '') }}">--}}
{{--                        @if($errors->has('land'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('land') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.member.fields.land_helper') }}</span>--}}
{{--                    </div>--}}

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="enamel">{{ trans('cruds.member.fields.enamel') }}</label>
                        <input class="form-control {{ $errors->has('enamel') ? 'is-invalid' : '' }}" type="text" name="enamel" id="enamel" value="{{ old('enamel', '') }}">
                        @if($errors->has('enamel'))
                            <div class="invalid-feedback">
                                {{ $errors->first('enamel') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.enamel_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="date_of_birth">{{ trans('cruds.member.fields.date_of_birth') }}</label>
                        <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        @if($errors->has('date_of_birth'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date_of_birth') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.date_of_birth_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.member.fields.gender') }}</label>
                        @foreach(App\Models\Member::GENDER_RADIO as $key => $label)
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
                        <span class="help-block">{{ trans('cruds.member.fields.gender_helper') }}</span>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="photograph">{{ trans('cruds.member.fields.photograph') }}</label>--}}
{{--                        <div class="needsclick dropzone {{ $errors->has('photograph') ? 'is-invalid' : '' }}" id="photograph-dropzone">--}}
{{--                        </div>--}}
{{--                        @if($errors->has('photograph'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('photograph') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.member.fields.photograph_helper') }}</span>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="birthplace">{{ trans('cruds.member.fields.birthplace') }}</label>
                        <input class="form-control {{ $errors->has('birthplace') ? 'is-invalid' : '' }}" type="text" name="birthplace" id="birthplace" value="{{ old('birthplace', '') }}">
                        @if($errors->has('birthplace'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birthplace') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.birthplace_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="iban">{{ trans('cruds.member.fields.iban') }}</label>
                        <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                        @if($errors->has('iban'))
                            <div class="invalid-feedback">
                                {{ $errors->first('iban') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.iban_helper') }}</span>
                    </div>
                    <div class="form-group" id="amount_div">
                        <label for="amount">{{ trans('cruds.member.fields.amount') }}</label>
                        <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', '') }}">
                        @if($errors->has('amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.member.fields.amount_helper') }}</span>
                    </div>
                    <div class="terms" style="display: none">
                        <div class="form-group" id="terms_1_div">
                            <input class="form-check d-inline {{ $errors->has('terms_1') ? 'is-invalid' : '' }}" type="checkbox" name="terms_1" id="terms_1" value="{{ old('terms_1', 1) }}">
                            <label for="terms_1">{{ trans('cruds.member.fields.terms_1') }}</label>
                            @if($errors->has('terms_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.terms_1_helper') }}</span>
                        </div>
                    </div>
                        <div class="form-group" id="terms_2_div">
                            <input class="form-check d-inline {{ $errors->has('terms_2') ? 'is-invalid' : '' }}" type="checkbox" required name="terms_2" id="terms_2" value="{{ old('terms_2', 1) }}">
                            <label for="terms_2" class="form-check-label">{{ trans('cruds.member.fields.terms_2') }}</label>
                            @if($errors->has('terms_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.terms_2_helper') }}</span>
                        </div>

                    <div class="form-group">
                        {!! htmlFormSnippet() !!}
                        @if($errors->has('g-recaptcha-response'))
                            <div class="invalid-feedback">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                        @endif
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button class="btn btn-danger" type="submit">
                            verzenden
                        </button>
                    </div>
                </div>
            </div>

<?php //print_r($errors,true); ?>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.photographDropzone = {
    url: '{{ route('members.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photograph"]').remove()
      $('form').append('<input type="hidden" name="photograph" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photograph"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($member) && $member->photograph)
      var file = {!! json_encode($member->photograph) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photograph" value="' + file.file_name + '">')
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
<script>
    // $(function (){
    //     if($('#type_of_donor').val()==='Financial'){
    //         $('#amount_div').show();
    //     }else{
    //         $('#amount_div').hide();
    //     }
    //     $('#type_of_donor').on('change',function (){
    //         if($(this).val()==='Financial'){
    //             $('#amount_div').show();
    //         }else{
    //             $('#amount_div').hide();
    //         }
    //     });
    // });
    $(function (){

        // if($('#type_of_donor').val()==='Financial'){
        //     $('#amount_div').show();
        // }else{
        //     $('#amount_div').hide();
        // }
        $('#type_of_donor').on('change',function (){
            if($(this).val()==='Financial'){
                $('.terms').show();
            }else{
                $('.terms').hide();
            }
        });
    });
    function showTerms(v){
        if(v==='Financial'){
            $('.terms').show();
        }else{
            $('.terms').hide();
        }
    }
</script>
@endsection
