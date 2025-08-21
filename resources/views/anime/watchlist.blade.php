<x-layout>
    <h2>Watchlist</h2>

    @foreach($animes as $anime)
        <h2>Title: {{ $anime->title }}</h2>
    @endforeach

</x-layout>