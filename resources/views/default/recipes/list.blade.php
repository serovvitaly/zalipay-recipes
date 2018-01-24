@extends('default.layout-9-3')

@section('content')
    <div class="col-lg-12">
        <div class="row">
            @foreach($recipes as $recipe)
                @include('default.recipes.list-item', ['recipe' => $recipe])
            @endforeach
        </div>
    </div>
    <nav aria-label="navigation justify-content-center">
    {!! $recipes->links() !!}
    </nav>
@endsection