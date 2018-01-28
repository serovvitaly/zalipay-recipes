<div class="card">
    <a href="/recipe{{ $recipe->id }}" class="title-image">
        <img class="card-img-top" src="/img/396x254/{{ md5($recipe->image) }}.jpg" alt="{{ $recipe->name }}">
        <span><h5>{{ $recipe->name }}</h5></span>
    </a>
    <div class="card-body">
        <div class="row small text-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">{{ $recipe->total_time }}</div>
            <div class="col-lg-4">{{ $recipe->recipe_yield }}</div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <div class="card-footer">
        @foreach($recipe->tags as $tag)
            <a href="/tag{{ $tag->id }}"><span class="badge badge-warning">{{ $tag->name }}</span></a>
        @endforeach
    </div>
</div>