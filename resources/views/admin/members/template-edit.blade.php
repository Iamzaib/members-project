@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('cruds.template.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.templates.update", ['template'=>$template->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="title" value="Birthday Email Template">
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.template.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $template->subject) }}" required>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="line1">{{ trans('cruds.template.fields.line1') }}</label>
                <input class="form-control {{ $errors->has('line1') ? 'is-invalid' : '' }}" type="text" name="line1" id="line1" value="{{ old('line1', $template->line1) }}" required>
                @if($errors->has('line1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('line1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.line1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="line2">{{ trans('cruds.template.fields.line2') }}</label>
                <input class="form-control {{ $errors->has('line2') ? 'is-invalid' : '' }}" type="text" name="line2" id="line2" value="{{ old('line2', $template->line2) }}" required>
                @if($errors->has('line2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('line2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.line2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.template.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $template->url) }}" required>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.url_helper') }}</span>
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
