@extends('master.message_box')

@section('title')
    {{ trans('error.404') }}
@endsection

@section('content')
    {{ trans('error.404_message') }}
@endsection

@section('button_route')
    {{ route('home') }}
@endsection

@section('button_icon')
    home
@endsection