@if (is_string($item))
    <li class="collection-header" style="font-size: 16px">{{ $item }}</li>
@else
    <li>
        <div class="collapsible-header">

            <i class="material-icons {{ $item['icon_color']}}-text">{{ $item['icon'] }}
            </i>

            <a style="color: inherit;" href="{{ $item['url'] }}">{{ $item['text'] }}</a>

        </div>

        @if (isset($item['submenu']))
        <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="accordion">
                @each('layouts.partial.sidebar', $item['submenu'], 'item')  
            </ul>
        </div>
        @endif
    </li>
@endif