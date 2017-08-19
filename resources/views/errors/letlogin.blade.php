@extends('master.message_box')

@section('title')
    {{ trans('error.guest_title') }}
@endsection

@section('content')
    {{ trans('error.guest_access') }}
@endsection

@section('button_route')
    {{ route('login') }}
@endsection

@section('button_icon')
    account_circle
@endsection