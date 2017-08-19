@if(Auth::user()->user_role >= $item['role_access'])
    <li>
    @if (isset($item['submenu']))
        <div class="collapsible-header active">

            <i class="material-icons {{ $item['icon_color'] }}-text ">{{ $item['icon'] }}</i>

            <a style="color: inherit; font-size: 14px" href="{{ url($item['url']) }}"><b>{{ trans('menu.'.$item['text']) }}</b></a>
        </div>
        <div class="divider"></div>
        <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="expandable">
                @each('partial.sidebar', $item['submenu'], 'item')  
            </ul>
        </div>
    @else
        <div class="collapsible-header">

            <i class="material-icons {{ $item['icon_color']}}-text ">{{ $item['icon'] }}</i>

            <a style="color: inherit;" href="{{ url($item['url']) }}">{{ trans('menu.'.$item['text']) }}</a>
      </div>
    @endif
    </li>

@endif

