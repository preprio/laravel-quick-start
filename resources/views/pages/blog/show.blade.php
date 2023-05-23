<div>
    <h1>{{ data_get($article,'title') }}</h1>

    @if(data_get($article,'content'))
        @foreach(data_get($article,'content') as $content)

            @if(data_get($content,'__typename') === 'Assets')
                <div class="my-10">
                    <img src="{{ data_get($content,'items.0.url') }}" width="300" height="250"/>
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