<li class="{{ $item->getItemClass() ? $item->getItemClass() : null }}
    {{ $active ? 'active' : null }}
">
    <a href="{{ $item->getUrl() }}" class="{{ count($appends) > 0 ? 'hasAppend' : null }}"
        @if ($item->getNewTab())
            target="_blank"
        @endif
    >
        <i class="{{ $item->getIcon() }}"></i>
        <span class="title">{{ $item->getName() }}</span>
        @if ($item->hasItems())
            <span class="arrow"></span>
        @endif
        
        @foreach ($badges as $badge)
            {!! $badge !!}
        @endforeach
    </a>

    @foreach ($appends as $append)
        {!! $append !!}
    @endforeach

    @if (count($items) > 0)
        <ul class="sub-menu">
            @foreach ($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
