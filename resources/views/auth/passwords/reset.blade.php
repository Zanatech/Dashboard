@extends('layouts.AuthForm')

@section('form_message')
    {{ trans('auth.reset_message') }}
@endsection

@section('form_action')
    {{ url(config('route.password_reset')) }}
@endsection

@section('form_button_message')
    {{ trans('auth.reset_password') }}
@endsection

@section('links')

@endsection

@section('Fields')
    <!-- Email Field -->
    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="input-field col s6">
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

    <!-- Password Field -->
    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        <div class="input-field col s6">
          <i class="material-icons prefix">{{ config('icon.password') }}</i>
          <input type="password" name="password" class="form-control" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.password') }}</label>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- Retype_Password Field -->
    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        <div class="input-field col s6">
          <i class="material-icons prefix">{{ config('icon.password') }}</i>
          <input type="password" name="password_confirmation" class="form-control" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.retype_password') }}</label>
        </div>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
@endsection