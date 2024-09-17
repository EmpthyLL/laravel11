<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <style>
        .card {
            border: 1px solid gray;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            min-width: 100px;
            max-width: 450px;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            gap: 20px;
            align-items: center;
        }
        img {
            border-radius: 50%;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/about') }}">About</a>
        <a href="{{ url('/blog') }}">Blog</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </nav>

    <h1>Contact Us</h1>
    
    <div class="card">
        <div>
            <img src="{{ asset('img/mikir 9.jpg') }}" width="200px" alt="Profile Picture">
        </div>
        <div>
            <h2>Sarah Marc</h2>
            <h3 style="margin-top: -20px; color:#999">{{ $contact['email'] }}</h3>
            <h3>{{ $contact['phone'] }}</h3>
        </div>
    </div>
</body>
</html>
