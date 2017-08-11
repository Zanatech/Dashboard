@extends('layouts.CreateForm')

@section('form_title')
   <i class="large teal-text material-icons">assignment</i> 
   <br>
   {{ trans('create.job_title') }} 
@endsection

@section('form_message')
    {{ trans('create.job_message') }}
@endsection

@section('form_action')
    {{ url(config('route.save_client')) }}
@endsection

@section('form_button_message')
    {{ trans('create.create_button') }}
@endsection

@section('Fields')

@endsection