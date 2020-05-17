<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <a href="/">HOME</a>
    <a href="/php">PHP Learning</a>
    <a href="/js">JS Learning</a>
    @yield('content')
</body>
</html>