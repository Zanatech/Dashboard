@extends('master.page')

@section('content')

  
	@foreach(config('user.admin_panel.menu') as $item)
  <ul class="collection col l6 m12 s12">
    <li class="collection-item avatar">
      <img src="{{ asset('img/'. $item['img']) }}" alt="" class="circle">
      <span class="title"><b>{{ trans('admin_panel.'.$item['link_name']) }}</b></span>
        <br>{{ trans('admin_panel.'.$item['content']) }}
      </p>
      <a href="{{ $item['link_action'] }}" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
    </li>       
  </ul>   
  @endforeach  

@endsection