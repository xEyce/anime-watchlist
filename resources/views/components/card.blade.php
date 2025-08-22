<div class="bg-white shadow-md rounded-lg overflow-hidden w-64">
  <!-- Full Image Display -->
  <img 
    src="{{ $anime['images']['jpg']['image_url'] ?? '' }}" 
    alt="{{ $anime['title'] }}" 
    class="w-full h-96 object-cover bg-gray-100"
  >

  <div class="p-4">
      <p class="text-lg font-bold truncate">{{ $anime['title'] }}</p>
      <p class="text-sm text-gray-500 mb-2">⭐ {{ $anime['score'] }}</p>

      <form action="{{ route('anime.add') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="hidden" name="mal_id" value="{{ $anime['mal_id'] }}">
            <input type="hidden" name="title" value="{{ $anime['title'] }}">
            <input type="hidden" name="image_url" value="{{ $anime['images']['jpg']['image_url'] ?? '' }}">
            <input type="hidden" name="score" value="{{ $anime['score'] }}">
            <input type="hidden" name="synopsis" value="{{ $anime['synopsis'] ?? '' }}">
            <input type="hidden" name="episodes" value="{{ $anime['episodes'] }}">
            <input type="hidden" name="type" value="{{ $anime['type'] }}">

            <button type="submit" 
              class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
              Add
            </button>
            <a href="{{ route('anime.view', $anime['mal_id']) }}" 
              class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition">
              More
            </a>
      </form>
  </div>
</div>
