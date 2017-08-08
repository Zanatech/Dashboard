@extends('layouts.MessageBox')

@section('title')
    {{ trans('error.denied_title') }}
@endsection

@section('content')
    {{ trans('error.denied_message') }}
@endsection

@section('button_route')
    {{ url(config('route.dashboard')) }}
@endsection

@section('button_icon')
    {{ config('icon.home') }}
@endsection
