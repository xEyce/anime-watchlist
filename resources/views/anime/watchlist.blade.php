<x-layout>
    {{-- <h2>Watchlist</h2>

    @foreach($watchlist as $anime)
        <h2>Title: {{ $anime->anime->title }}</h2>
    @endforeach --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
    @foreach($watchlist as $anime)
    <div class="w-60 h-120 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-gray-900 hover:shadow-2xl hover:shadow-sky-400 transition-shadow">
        <img src="{{ $anime->anime->image_url ?? '' }}" alt="">
        <div class="">
            <p class="font-extrabold">{{ $anime->anime->title }}</p>
            
            <form action="{{ route('anime.add') }}" method="POST">
            @csrf
            <div>
                <button type="submit" class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">
                    Add
                </button>
                <a href="{{ route('anime.view', $anime->anime->mal_id) }}" class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">
                    More
                </a>
            </div>
        </form>
        </div>
    </div>
    @endforeach
</div>


</x-layout>