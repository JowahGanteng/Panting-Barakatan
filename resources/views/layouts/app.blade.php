<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musik Panting</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Musik Panting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('albums.index') }}">Albums</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('songs.index') }}">Songs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('artists.index') }}">Artists</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admins.index') }}">Admins</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pelanggans.index') }}">Pelanggan</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
