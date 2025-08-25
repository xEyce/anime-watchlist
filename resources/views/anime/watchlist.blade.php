<x-layout>
<div class="max-w-6xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($watchlist as $anime)
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
        <img src="{{ $anime->anime->image_url ?? '' }}" 
             alt="{{ $anime->anime->title }}" 
             class="w-full h-96 object-cover bg-gray-100">

        <div class="p-4 flex flex-col justify-between">
            <p class="text-lg font-bold truncate">{{ $anime->anime->title }}</p>
            <p class="text-sm text-gray-500 mb-2">⭐ {{ $anime->anime['score'] }}</p>

            <div class="flex justify-between items-center">
                <a href="{{ route('anime.view', $anime->anime->mal_id) }}" 
                   class="px-3 py-2 text-sm rounded-lg bg-indigo-500 text-white hover:bg-indigo-600 transition">
                    View More
                </a>
                <div class="flex">
                    <form action="{{ route('anime.add') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1 text-white text-sm rounded-lg transition">
                            ➕
                        </button>
                    </form>

                    <form action="{{ route('delete', $anime->anime->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="px-3 py-1 text-white text-sm rounded-lg transition">
                            ➖
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
</div>
</x-layout>
