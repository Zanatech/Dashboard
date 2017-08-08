@extends('layouts.CreateForm')

@section('form_title')
   <i class="large teal-text material-icons">account_box</i> 
   <br>
   {{ trans('create.client_title') }} 
@endsection

@section('form_message')
    {{ trans('create.client_message') }}
@endsection

@section('form_action')
    {{ url(config('route.save_client')) }}
@endsection

@section('form_button_message')
    {{ trans('create.create_button') }}
@endsection

@section('Fields')
    <!-- Full_Name Field -->
    <div class="col s12 m12 {{ $errors->has('name') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.account') }}</i>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('create.client_name') }}</label>
        </div>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- Email Field -->
    <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.mail') }}</i>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('create.client_email') }}</label>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

@endsection