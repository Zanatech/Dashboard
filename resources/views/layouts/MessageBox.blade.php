@extends('layouts.master')

@section('Custom_CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/message_card.css') }}">
@endsection

@section('body')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <h1 class="center">@yield('title')</h1>
                <div class="card-content">
                    <p class="center" style="font-size: 20px">@yield('content')</p>
                </div>
                <div class="card-action">
                    <a href="@yield('button_route')" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">@yield('button_icon')</i></a> 
                </div>
            </div>
        </div>
    </div>
@endsection