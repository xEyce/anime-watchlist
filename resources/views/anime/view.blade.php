<x-layout>
    <div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $anime['title'] }}</h1>

        <div class="flex flex-col md:flex-row gap-6">
            <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}"
                 class="w-full md:w-1/3 rounded-lg shadow">

            <div class="flex-1 space-y-3">
                <p class="text-gray-700">{{ $anime['synopsis'] }}</p>
                <p><strong>Episodes:</strong> {{ $anime['episodes'] }}</p>
                <p><strong>Score:</strong> {{ $anime['score'] }}</p>
                <p>
                    <strong>Genres:</strong>
                    @foreach ($anime['genres'] as $genre)
                        <span class="inline-block bg-gray-100 px-2 py-1 rounded text-sm mr-1">
                            {{ $genre['name'] }}
                        </span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</x-layout>
