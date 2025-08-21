
<div class="card">
    {{ $slot }}
    <div>
        <form action="{{ route('anime.add') }}" method="POST">
            @csrf
            <input type="hidden" name="mal_id" value="{{ $anime->mal_id }}">
            <input type="hidden" name="title" value="{{ $anime->title }}">
            <input type="hidden" name="image_url" value="{{ $anime->image_url }}">
            <input type="hidden" name="score" value="{{ $anime->score }}">
            <input type="hidden" name="synopsis" value="{{ $anime->synopsis }}">
            <input type="hidden" name="episodes" value="{{ $anime->episodes }}">
            <input type="hidden" name="type" value="{{ $anime->type }}">
    
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
        </form>
        
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View Details</button>
    </div>
    
</div>

