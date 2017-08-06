@extends('layouts.AuthForm')

@section('form_message')
    {{ trans('auth.login_message') }}
@endsection

@section('form_action')
    {{ url(config('route.login')) }}
@endsection

@section('form_button_message')
    {{ trans('auth.sign_in') }}
@endsection

@section('links')
    <a href="{{ url(config('route.password_reset')) }}"
    class="teal-text"
    >{{ trans('auth.i_forgot_my_password') }}</a>

    <br>

    @if (config('route.register'))
        <a href="{{ url(config('route.register')) }}"
        class="teal-text"
        >{{ trans('auth.register_a_new_membership') }}</a>
    @endif
@endsection

@section('Fields')
    <!-- Email Field -->
    <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">{{ config('icon.mail') }}</i>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">{{ trans('auth.email') }}</label>
        </div>
        @if ($errors->has('email'))
            <span class="">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Passwords Field -->
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
@endsection