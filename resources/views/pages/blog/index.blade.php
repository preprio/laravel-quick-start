<div>
    <h1>My blog site</h1>
    @if(data_get($articles,'items'))
        <ul>
            @foreach(data_get($articles,'items') as $article)
                <li>
                    <a href="{{ url(data_get($article,'_slug')) }}">{{ data_get($article,'title') }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>