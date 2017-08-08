@extends('layouts.CreateForm')

@section('form_title')
   <i class="large teal-text material-icons">list</i> 
   <br>
   {{ trans('create.asset_title') }} 
@endsection

@section('form_message')
    {{ trans('create.asset_message') }}
@endsection

@section('form_action')
    {{ url(config('route.save_asset')) }}
@endsection

@section('form_button_message')
    {{ trans('create.create_button') }}
@endsection

@section('Fields')

@endsection