@extends('default.layout-2-10')

@section('content')
    <div class="col-lg-8">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header">
                <h1>{{ $recipe->name }}</h1>
                <a class="small" target="_blank" href="{{ $recipe->source_url->url }}">{{ $recipe->source_url->url }}</a>
            </div>
            <div class="list-group list-group-flush">
                <img style="width: 100%" src="/img/origin/{{ md5($recipe->image) }}.jpg" alt="{{ $recipe->name }}">
                <p lass="list-group-item">
                    {{ $recipe->description }}
                </p>
                <p class="list-group-item card-ingredients-header">Ингредиенты</p>
                <ul class="list-group list-group-flush">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($recipe->ingredients()->get() as $ingredient)
                            <tr>
                                <td>{{ $ingredient->name }}</td>
                                <td>{{ $ingredient->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
            </div>
        </div>

        @foreach($recipe->instructions()->get() as $instruction)
            <div class="card card-instruction" style="margin-bottom: 20px;">
                <div class="card-header">Шаг {{ $instruction->step_num }}</div>
                <ul class="list-group list-group-flush">
                    @if(!empty($instruction->media_url))
                    <img style="width: 100%" src="https://wowfood.club{{ $instruction->media_url }}" alt="{{ $instruction->text }}"/>
                    @endif
                    <li class="list-group-item">{{ $instruction->text }}</li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="col-lg-4">
        <div class="row menu-chessboard" style="padding: 0 15px;">
            <a class="col-lg-4" href="#">
                <img src="/icons/004_Fish.png"><br>
                РЫБА
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/037_Poultry.png"><br>
                КУРИЦА
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/035_Prawn.png"><br>
                КРЕВЕТКИ
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/028_Meat.png"><br>
                МЯСО
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/062_FriedEgg.png"><br>
                Завтраки
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/005_Lettuce.png"><br>
                САЛАТЫ
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/047_Squid.png"><br>
                КАЛЬМАРЫ
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/055_Muffin.png"><br>
                ВЫПЕЧКА
            </a>
            <a class="col-lg-4" href="#">
                <img src="/icons/060_Soup.png"><br>
                СУПЫ
            </a>
        </div>
        <p></p>
        @foreach($recipes as $recipesItem)
            <div class="recipe-list-item">
            @include('default.recipes.list-item', ['recipe' => $recipesItem])
            </div>
        @endforeach
    </div>
@endsection