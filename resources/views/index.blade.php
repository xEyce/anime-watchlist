<x-layout>
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-700">
            Top {{ $genreName }} Anime
        </h2>
        <form action="{{ route('genres.action') }}" method="POST" class="flex gap-4 items-center">
            @csrf
            <label class="flex items-center gap-2">
                <input type="radio" name="genre" value="1" class="text-indigo-500"> Action
            </label>
            <label class="flex items-center gap-2">
                <input type="radio" name="genre" value="22" class="text-indigo-500"> Romance
            </label>
            <label class="flex items-center gap-2">
                <input type="radio" name="genre" value="24" class="text-indigo-500"> Sci-fi
            </label>
            <button type="submit" 
                class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                Filter
            </button>
        </form>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($animes as $anime)
            <x-card :anime="$anime" />
        @endforeach
    </div>
</x-layout>
