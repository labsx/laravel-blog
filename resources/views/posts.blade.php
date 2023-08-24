<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    <div>
       <a href="/register"><button type="submit" style="float: right;">Register</button></a> 
    </div>
    <div>
        <a href="/login"><button type="submit" style="float: right;">login</button></a>
    </div>

    @foreach ($posts as $post)
        <div>
            <h4><a href="/posts/{{ $post->slug }}"> {{ $post->title }} </h4>   
        </div> 
        <div>
            <p>{{ $post->body }}</p>
        </div>
    @endforeach
</body>
</html>