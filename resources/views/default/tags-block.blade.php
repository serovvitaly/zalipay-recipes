<?php
$tags = \App\Models\Tag::all();
?>
@foreach($tags as $tag)
    <a href="/tag{{ $tag->id }}" class="btn btn-secondary btn-sm">{{ $tag->name }}</a>
@endforeach
