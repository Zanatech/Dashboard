@extends('layouts.master')

@section('Custom_CSS')
    <style type="text/css">
        
        html
        {
            background: #cfd8dc;
        }

        .row
        {
            min-width: 400px;
            width: 600px;
            margin: 7% auto;
        }

        @media (max-width: 768px) {
            .row
            {
                width: 90%;
                margin-top: 20px;
            }
        }
    </style>
@endsection

@section('body')
    <content class="center col s12 m12">
        <div class="card-panel">
            <div class="register-logo">
                <h3><a href="{{ url(config('master.dashboard_url')) }}">{!! config('master.logo') !!}</a></h3>
            </div>
            <p class="">{{ trans('index.register_message') }}</p>
            <form action="{{ url(config('master.register_url')) }}" method="post">
                {!! csrf_field() !!}

                <div class="col s12 m12 {{ $errors->has('name') ? 'has-error' : '' }}">

                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.full_name') }}</label>
                    </div>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">

                    <div class="input-field">
                      <i class="material-icons prefix">mail</i>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.email') }}</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12 m12 {{ $errors->has('password') ? 'has-error' : '' }}">

                    <div class="input-field">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" name="password" class="form-control" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.password') }}</label>
                    </div>

                    @if ($errors->has('password'))
                        <span class="">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12 m12 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <div class="input-field">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" name="password_confirmation" class="form-control" ] id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.retype_password') }}</label>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit"
                        class="right waves-effect waves-light btn"
                >{{ trans('index.register') }}</button>
            </form>

            <div class="">
                <a href="{{ url(config('master.login_url')) }}"
                   class="teal-text">{{ trans('index.i_already_have_a_membership') }}</a>
            </div>

        </div>
    </content>
@stop