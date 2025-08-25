<div  class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
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

            <div class="flex justify-between items-center">
              <a href="{{ route('anime.view', $anime['mal_id']) }}" 
                class="px-3 py-2 text-sm rounded-lg bg-indigo-500 text-white hover:bg-indigo-600 transition">
                View More
              </a>
              <button type="submit" 
                class="px-3 py-1 text-white text-sm rounded-lg transition">
                ➕
              </button>
              
            </div>
            
      </form>
  </div>
</div>
