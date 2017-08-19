@extends('master.page')

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

@if(isset($content) and !is_null($content))
    <content class="center col s12 m12">
        <div class="card-panel">

            <i class="large teal-text material-icons">{{ $content['icon'] }}</i> 
            <br>
            <h3>{{ trans('form.'.$content['title']) }}</h3>
            <p>{{ trans('form.'.$content['message']) }}</p>

            <!-- Auth Form -->
            @if (isset($content['has_file']) and !is_null($content['has_file']))
            <form action="{{ url($content['action']) }}" method="post" enctype="multipart/form-data">
            @else
            <form action="{{ url($content['action']) }}" method="post">
            @endif
            
                {!! csrf_field() !!}

                <!-- Fields Generator -->
                @if (isset($content['fields']) and !is_null($content['fields']))
                    @each('partial.field', $content['fields'], 'field')
                @endif

                <!-- Submit Button -->
                <div class="row">

                    <div class="right col m4">
                        <button type="submit" class=" waves-effect waves-light btn">
                            {{ trans('form.'.$content['button_message']) }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </content>
@endif

@stop
