<div>
    <h1>{{ data_get($post,'title') }}</h1>

    <div class="my-10">
        <img src="{{ data_get($post,'cover.url') }}" />
    </div>

    @if(data_get($post,'content'))
        @foreach(data_get($post,'content') as $content)

            @if(data_get($content,'__typename') === 'Assets')
                <div class="my-10">
                    <img src="{{ data_get($content,'items.0.url') }}" />
                </div>
            @endif

            @if(data_get($content,'__typename') === 'Text')
                <div>
                    {!! data_get($content,'body') !!}
                </div>
            @endif

        @endforeach
    @endif
</div>