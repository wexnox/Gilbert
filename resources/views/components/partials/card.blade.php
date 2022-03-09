<div {{ $attributes->class(['w-64 p-2 shadow']) }} >
    @if(isset($image))
        {{ $image }}
    @endif
    <div class="pt-2 space-y-2">
        <h2 {{ $title->attributes->class(['font-bold text-blue text-sm']) }}>
            @isset($title)
                {{ $title }}
            @endisset
        </h2>
        <p {{ $attributes->class(['text-xs text-grey-400']) }}>
            @isset($body)
                {{ $body }}
            @endisset
        </p>
    </div>

</div>

