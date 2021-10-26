<x-layout>
    <article>
       <h1>{{ $post->title; }}</h1>

       <p>
           Written by <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in
           <a href="/cagegories/{{$post->category->slug}}">
            {{ $post->category->name }}
           </a>
       </p>

       <div>
           {!! $post->body; !!}
       </div>

    </article>
    <p>
        <a href="/">Go Back</a>
    </p>
</x-layout>
