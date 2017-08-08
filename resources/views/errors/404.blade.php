@extends('layouts.MessageBox')

@section('title')
    {{ trans('error.404') }}
@endsection

@section('content')
    {{ trans('error.404_message') }}
@endsection

@section('button_route')
    {{ url(config('route.dashboard')) }}
@endsection

@section('button_icon')
    {{ config('icon.home') }}
@endsection