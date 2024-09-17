<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Home</title>
    <style>
        .box{
            border: 1px solid gray;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
        }
        .contain{
            display: grid;
            grid-template-columns: repeat( 3, minmax(250px, 1fr) );
            gap:10px;
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
    <h1>My Blogs</h1>
    <div class="contain">
        <?php for($i = 0; $i < $many; $i++ ) :?>
            <div class="box">
                <h2>Blog {{ $i + 1}}</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, magni iure delectus inventore fugit blanditiis cum totam odio in ipsa tenetur placeat ullam vero provident magnam rerum soluta consectetur repellat.</p>
            </div>
        <?php endfor ?>
    </div>
</body>
</html>