<div class="col-lg-6">
    <div class="card">
        <a href="/recipe{{ $recipe->id }}">
            <img class="card-img-top" src="https://wowfood.club{{ $recipe->image }}" alt="{{ $recipe->name }}">
        </a>
        <div class="card-body">
            <h5 class="card-title"><a href="/recipe{{ $recipe->id }}">{{ $recipe->name }}</a></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
</div>