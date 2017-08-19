@extends('master.auth_form')

@section('form_message')
    {{ trans('auth.login_message') }}
@endsection

@section('form_action')
    {{ route('login') }}
@endsection

@section('form_button_message')
    {{ trans('auth.sign_in') }}
@endsection

@section('links')
    <a href="{{ route('register') }}"
    class="teal-text"
    >{{ trans('auth.register_a_new_membership') }}</a>
@endsection

@section('Fields')
    <!-- Email Field -->
    <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="input-field">
          <i class="material-icons prefix">mail</i>
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
          <i class="material-icons prefix">lock</i>
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