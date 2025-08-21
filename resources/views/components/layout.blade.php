<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Watchlist</title>

    @vite('resources/css/app.css')
</head>
<body>
    @if(session('success'))
        <div class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('error') }}
        </div>
    @endif

    <header>
        <nav>
            <h1><a href="{{ route('index') }}">ANILIST</a></h1>
            
            
            
            <a href="" class="btn">Login</a>
            <a href="" class="btn">Register</a>
        

        
            <span class="border-r-2 pr-2">
                Hi, there. EYCE
            </span>
            <a href="{{ route('anime.watchlist') }}">Watchlist</a>
            <form action="" method="" class="m-0">
                @csrf
                <button class="btn">Logout</button>
            </form>
            
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
    
</body>
</html>