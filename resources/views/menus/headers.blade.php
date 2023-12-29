@php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
@endphp

@foreach ($items as $menu_item)
    <li>
        <a href="{{ $menu_item->url }}">{{ $menu_item->title }}
            @if ($menu_item->title == 'Videos')
                <i class="las la-angle-down"></i>
            @endif
        </a>
        @php
            $submenu = $menu_item->children;
        @endphp

        @if (isset($submenu))
            <ul class="{{ $menu_item->title == 'News' ? 'dropdown' : '' }}">
                @foreach ($submenu as $item)
                    <li><a href="{{ $item->url }}">{{ $item->title }} </a></li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach

{{-- @php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
@endphp

@foreach ($items as $menu_item)
    <li>
        <a href="{{ $menu_item->url }}">{{ $menu_item->title }}
            <i class="las la-star"></i>
        </a>
    </li>
@endforeach --}}
