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

    <content class="center col s12 m12">
        <div class="card-panel">

            <h3><a href="{{ url(config('master.dashboard_url')) }}">{!! config('master.logo') !!}</a></h3>

            <p class="">{{ trans('index.login_message') }}</p>

            <form action="{{ url(config('master.login_url')) }}" method="post">
                {!! csrf_field() !!}

                <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">

                    <div class="input-field">
                      <i class="material-icons prefix">mail</i>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="icon_prefix" type="text" class="validate">
                      <label for="icon_prefix">{{ trans('index.email') }}</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="">
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

                <div class="row">

                    <div class="right col m4">
                        <button type="submit" class=" waves-effect waves-light btn">{{trans('index.sign_in')}}</button>
                    </div>

                </div>
            </form>

            <div>
                <a href="{{ url(config('master.password_reset_url')) }}"
                   class="teal-text"
                >{{ trans('index.i_forgot_my_password') }}</a>

                <br>

                @if (config('master.register_url'))
                    <a href="{{ url(config('master.register_url')) }}"
                       class="teal-text"
                    >{{ trans('index.register_a_new_membership') }}</a>
                @endif

            </div>
        </div>
    </content>
@stop
