<!DOCTYPE html>

<link rel="stylesheet" href="./app.css">
<title>My Blog</title>

<body>

    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->slug; }}">
                {{ $post->title }}
            </a>
        </h1>
        <div>
            {{ $post->excerpt; }}
        </div>
    </article>
    @endforeach
</body>
