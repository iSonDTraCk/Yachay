<!DOCTYPE html>
<html lang="es">
<head>
    <title>YACHAY</title>
</head>
<body>
    <body class="bg-gray-100 text-gray-900">
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @yield('content')
</body>
</html>