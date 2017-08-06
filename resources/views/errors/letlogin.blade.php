@extends('layouts.MessageBox')

@section('title')
    {{ trans('error.guest_title') }}
@endsection

@section('content')
    {{ trans('error.guest_access') }}
@endsection

@section('button_route')
    {{ url(config('route.login')) }}
@endsection

@section('button_icon')
    {{ config('icon.account') }}
@endsection