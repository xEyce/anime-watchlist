<x-layout>
    <h2>Watchlist</h2>

    @foreach($watchlist as $anime)
        <h2>Title: {{ $anime->anime->title }}</h2>
    @endforeach

</x-layout>