<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Watchlist</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-rubik">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div id="flash-message" class="p-4 text-center bg-green-100 text-green-700 font-semibold shadow-md">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div id="flash-message" class="p-4 text-center bg-red-100 text-red-700 font-semibold shadow-md">
            {{ session('error') }}
        </div>
    @endif
    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                flash.style.opacity = "0";
                flash.style.transform = "translateY(-20px)";

                setTimeout(() => flash.remove(), 500);
            }
        }, 3000);
    </script>

    {{-- Navbar --}}
    <header class="bg-white shadow-md">
        <nav class="flex items-center justify-between max-w-6xl mx-auto px-6 py-4">
            <h1 class="text-2xl font-extrabold text-indigo-600">
                <a href="{{ route('index') }}">ANILIST</a>
            </h1>

            <div class="flex items-center gap-4">
                @auth
                    <span class="pr-3 border-r text-sm text-gray-600">
                        👋 Hi, {{ strtoupper(Auth::user()->name) }}
                    </span>
                    <a href="{{ route('anime.watchlist') }}" 
                       class="px-3 py-2 text-sm rounded-lg bg-indigo-500 text-white hover:bg-indigo-600 transition">
                        Watchlist
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="px-3 py-2 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('show.login') }}" 
                       class="px-3 py-2 text-sm rounded-lg bg-indigo-500 text-white hover:bg-indigo-600 transition">
                        Login
                    </a>
                    <a href="{{ route('show.register') }}" 
                       class="px-3 py-2 text-sm rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                        Register
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    {{-- Main Content --}}
    <main class="max-w-6xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>
    
</body>
</html>
