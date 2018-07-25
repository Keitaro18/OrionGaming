<div class="post-preview">

<a href="/post/{{ $post->slug }}">
    <img class="article" src={{ Voyager::image($post->image) }}>    
</a>

<p class="post-meta">Posté par : <a href="#"> {{ $post->author->name }} </a> le {{ $post->created_at->format('d F, Y') }} </p>

</div>