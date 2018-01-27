@extends('default.layout-2-10')

@section('content')
    <div class="col-lg-12">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-lg-4 recipe-list-item">
                @include('default.recipes.list-item', ['recipe' => $recipe])
                </div>
            @endforeach
        </div>
    </div>
    <nav aria-label="navigation justify-content-center">
    {!! $recipes->links() !!}
    </nav>
@endsection