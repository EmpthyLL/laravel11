<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/about') }}">About</a>
        <a href="{{ url('/blog') }}">Blog</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </nav>
    <h1>About Us</h1>
    <p>Hallo, my name is {{ $nama }}.</p>
    <img src="img/mikir 9.jpg" alt="" width="400">
</body>
</html>