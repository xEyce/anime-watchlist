<x-layout>
    
    <div class="flex">
        <h2>Top {{ $genreName }}Anime</h2>
        <form action="{{ route('genres.action') }}" method="POST">
            @csrf
            <div class="flex gap-2">
                <label>
                    <input type="radio" name="genre" value="1">
                    Action
                </label>

                <label>
                    <input type="radio" name="genre" value="22">
                    Romance
                </label>

                <label>
                    <input type="radio" name="genre" value="24">
                    Sci-fi
                </label>

                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
    

   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach($animes as $anime)
            <x-card :anime="$anime" />
        @endforeach
    </div>

</x-layout>
