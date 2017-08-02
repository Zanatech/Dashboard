@extends('layouts.master')

@section('Custom_CSS')
    <style type="text/css">
        
        html
        {
            background: #0d47a1;
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
    <div class="card-panel">

        <div class="">

            <div class="">
                <a href="{{ url(config('master.dashboard_url', 'home')) }}">{!! config('master.logo') !!}</a>
            </div>
            <p class="">{{ trans('index.password_reset_message') }}</p>

            <form action="{{ url(config('master.password_reset_url') }}" method="post">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">mail</i>
                      <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.email') }}</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">

                    <div class="input-field col s6">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" name="password" class="form-control" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.password') }}</label>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" name="password_confirmation" class="form-control" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.retype_password') }}</label>
                    </div>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="right waves-effect waves-light btn"
                >{{ trans('index.reset_password') }}</button>
            </form>
        </div>
    </div>
@stop