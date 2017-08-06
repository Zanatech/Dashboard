@extends('layouts.master')

@section('Custom_CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/message_card.css') }}">
    <style type="text/css">
         html
        {
            background: #0d47a1;
        }
    </style>
@endsection

@section('body')

    <content class="center col s12 m12">
        <div class="card-panel">

            <h3><a href="{{ url(config('route.dashboard')) }}">{!! config('master.logo') !!}</a></h3>

            <p>@yield('form_message')</p>

            <!-- Auth Form -->
            <form action="@yield('form_action')" method="post">
                {!! csrf_field() !!}

                @yield('Fields')

                <!-- Submit Button -->
                <div class="row">
                    <div class="right col m4">
                        <button type="submit" class=" waves-effect waves-light btn">@yield('form_button_message')</button>
                    </div>
                </div>
            </form>

            <!-- Links to other Auth Form -->
            <div>
                @yield('links')
            </div>

        </div>
    </content>

@stop
