<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopi Ulee Kareng')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Masukkan CSS / Tailwind / Asset Anda di sini -->
</head>
<body>

    <!-- Bagian ini tempat @section('content') dari landing.blade.php akan dimasukkan -->
    @yield('content')

</body>
</html>