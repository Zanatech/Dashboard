@extends('layouts.page')

@section('Custom_CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style type="text/css">

        div.card-panel
        {
            min-width: 400px;
            width: 1000px;
            margin: 7% auto;
        }

        @media (max-width: 768px) {
            div.card-panel
            {
                width: 90%;
                margin-top: 20px;
            }
        }

    </style>
@endsection

@section('content')

    <content class="center col s12 m12">
        <div class="card-panel">

            <h3>@yield('form_title')</h3>

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
