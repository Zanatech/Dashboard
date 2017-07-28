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
    <div class="center col s12 m12">
        <div class="card-panel">
        <h3><a href="{{ url(config('master.dashboard_url')) }}">{!! config('master.logo') !!}</a></h3>
            <p class="">{{ trans('index.password_reset_message') }}</p>

            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ url(config('master.password_email_url', 'password/email')) }}" method="post">
                {!! csrf_field() !!}

                <div class="col s12 m12 {{ $errors->has('email') ? 'has-error' : '' }}">
                
                    <div class="input-field">
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

                <button type="submit"
                        class="right waves-effect waves-light btn"
                >{{ trans('index.send_password_reset_link') }}</button>
            </form>

            <div class="">
                <a href="{{ url(config('master.login_url')) }}"
                   class="teal-text">{{ trans('index.i_already_have_a_membership') }}</a>
            </div>
        </div>

    </div>
@stop