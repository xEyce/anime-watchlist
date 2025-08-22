<x-layout>
    <h1>{{ $anime['title'] }}</h1>
    <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}">
    <p>{{ $anime['synopsis'] }}</p>
    <p>Episodes: {{ $anime['episodes'] }}</p>
    <p>Score: {{ $anime['score'] }}</p>
    <p><strong>Genres:</strong>
        @foreach ($anime['genres'] as $genre)
                {{ $genre['name'] }}
        @endforeach
    </p>
</x-layout>