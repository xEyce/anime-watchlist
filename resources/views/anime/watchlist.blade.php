<x-layout>
<div class="max-w-6xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($watchlist as $anime)
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
        <img src="{{ $anime->anime->image_url ?? '' }}" 
             alt="{{ $anime->anime->title }}" 
             class="w-full h-96 object-cover bg-gray-100">

        <div class="p-4 flex flex-col justify-between">
            <p class="text-lg font-semibold text-gray-800 mb-3 truncate">{{ $anime->anime->title }}</p>

            <div class="flex justify-between items-center">
                <form action="{{ route('anime.add') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                        Add
                    </button>
                </form>

                <a href="{{ route('anime.view', $anime->anime->mal_id) }}" 
                   class="px-3 py-1 bg-gray-200 text-gray-800 text-sm rounded-lg hover:bg-gray-300 transition">
                    More
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</x-layout>
