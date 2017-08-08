@extends('layouts.AuthForm')

@section('form_message')
    {{ trans('auth.register_message') }}
@endsection

@section('form_action')
    {{ url(config('route.register')) }}
@endsection

@section('form_button_message')
    {{ trans('auth.register') }}
@endsection

@section('links')
    <a href="{{ url(config('route.login')) }}"
       class="teal-text">{{ trans('auth.i_already_had_an_account') }}</a>
@endsection

@section('Fields')
    <!-- Full_Name Field -->
    <div class="col s12 m12 {{ $errors->has('name') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.account') }}</i>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.full_name') }}</label>
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
          <label for="icon_prefix">{{ trans('auth.email') }}</label>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Password Field -->
    <div class="col s12 m12 {{ $errors->has('password') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.password') }}</i>
          <input type="password" name="password" class="form-control" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.password') }}</label>
        </div>
        @if ($errors->has('password'))
            <span class="">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- Retype_Password Field -->
    <div class="col s12 m12 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.password') }}</i>
          <input type="password" name="password_confirmation" class="form-control" ] id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.retype') }}</label>
        </div>
        @if ($errors->has('password_confirmation'))
            <span class="">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
@endsection