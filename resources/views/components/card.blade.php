
<!-- From Uiverse.io by Javierrocadev --> 
<div class="w-60 h-120 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-gray-900 hover:shadow-2xl hover:shadow-sky-400 transition-shadow">
  
  <img src="{{ $anime['images']['jpg']['image_url'] ?? '' }}" alt="">
  <div class="">
      <p class="font-extrabold">{{ $anime['title'] }}</p>
      <p class="">{{ $anime['score'] }}</p>
      <form action="{{ route('anime.add') }}" method="POST">
            @csrf
            <input type="hidden" name="mal_id" value="{{ $anime['mal_id'] }}">
            <input type="hidden" name="title" value="{{ $anime['title'] }}">
            <input type="hidden" name="image_url" value="{{ $anime['images']['jpg']['image_url'] ?? '' }}">
            <input type="hidden" name="score" value="{{ $anime['score'] }}">
            <input type="hidden" name="synopsis" value="{{ $anime['synopsis'] ?? '' }}">
            <input type="hidden" name="episodes" value="{{ $anime['episodes'] }}">
            <input type="hidden" name="type" value="{{ $anime['type'] }}">

            <div>
              <button type="submit" class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">
                Add
              </button>
              <a href="{{ route('anime.view', $anime['mal_id']) }}" class="bg-sky-700 font-extrabold p-2 px-6 rounded-xl hover:bg-sky-500 transition-colors">
                More
              </a>
            </div>
            
        </form>

  
  </div>
  
</div>