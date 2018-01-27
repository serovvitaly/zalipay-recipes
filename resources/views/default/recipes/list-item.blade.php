<div class="card">
    <a href="/recipe{{ $recipe->id }}" class="title-image">
        <img class="card-img-top" src="/img/396x254/{{ md5($recipe->image) }}.jpg" alt="{{ $recipe->name }}">
        <h5>{{ $recipe->name }}</h5>
    </a>
    <div class="card-body">
        <h5 class="card-title"><a href="/recipe{{ $recipe->id }}">{{ $recipe->name }}</a></h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
    </div>
</div>