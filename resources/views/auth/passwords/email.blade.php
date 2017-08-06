@extends('layouts.AuthForm')

@section('form_message')
    {{ trans('auth.email_message') }}
@endsection

@section('form_action')
    {{ url(config('route.password_reset')) }}
@endsection

@section('form_button_message')
    {{ trans('auth.send_email') }}
@endsection

@section('links')
    <a href="{{ url(config('route.login')) }}"
       class="teal-text">{{ trans('auth.i_already_had_an_account') }}</a>
@endsection

@section('Fields')
    <!-- Email Field -->
    <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">      
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.mail') }}</i>
          <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.email') }}</label>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
@endsection