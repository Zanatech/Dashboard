@extends('master.message_box')

@section('title')
    {{ trans('error.denied_title') }}
@endsection

@section('content')
    {{ trans('error.denied_message') }}
@endsection

@section('button_route')
    {{ route('home') }}
@endsection

@section('button_icon')
    home
@endsection
