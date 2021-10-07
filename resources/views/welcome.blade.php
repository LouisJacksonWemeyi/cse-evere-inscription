<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>
<body>
    @include('layouts.partials._nav')
    @yield('content')
</body>
</html>