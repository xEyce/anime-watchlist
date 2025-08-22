<x-layout>
    {{-- <h2>Watchlist</h2>

    @foreach($watchlist as $anime)
        <h2>Title: {{ $anime->anime->title }}</h2>
    @endforeach --}}
<div>
    @foreach($watchlist as $anime)
    <div>
        <img src="{{ $anime->anime->image_url ?? '' }}" alt="">
        <div class="">
            <p>{{ $anime->anime->title }}</p>
            
            <form action="{{ route('anime.add') }}" method="POST">
            @csrf
            <div>
                <button type="submit" >
                    Add
                </button>
                <a href="{{ route('anime.view', $anime->anime->mal_id) }}">
                    More
                </a>
            </div>
        </form>
        </div>
    </div>
    @endforeach
</div>


</x-layout>