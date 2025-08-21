<x-layout>
    <h2>Top Anime</h2>

    @foreach($animes as $anime)
        <div class="card">
            <img src="{{ $anime['images']['jpg']['image_url'] ?? '' }}" alt="">
            <h2>Title: {{ $anime['title'] }}</h2>

            <form action="{{ route('anime.add') }}" method="POST">
                @csrf
                <input type="hidden" name="mal_id" value="{{ $anime['mal_id'] }}">
                <input type="hidden" name="title" value="{{ $anime['title'] }}">
                <input type="hidden" name="image_url" value="{{ $anime['images']['jpg']['image_url'] ?? '' }}">
                <input type="hidden" name="score" value="{{ $anime['score'] }}">
                <input type="hidden" name="synopsis" value="{{ $anime['synopsis'] ?? '' }}">
                <input type="hidden" name="episodes" value="{{ $anime['episodes'] }}">
                <input type="hidden" name="type" value="{{ $anime['type'] }}">

                <button type="submit" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 
                           focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5">
                    Add
                </button>
            </form>

            <a href="{{ route('anime.view', $anime['mal_id']) }}" 
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 
                    focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 inline-block">
            View Details
            </a>
        </div>
    @endforeach

</x-layout>
