@extends('default.layout')

@section('content')
    <div class="col-lg-7">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header">
                <h1>{{ $recipe->name }}</h1>
                <a class="small" target="_blank" href="{{ $recipe->source_url->url }}">{{ $recipe->source_url->url }}</a>
            </div>
            <ul class="list-group list-group-flush">
                <img style="width: 100%" src="https://wowfood.club{{ $recipe->image }}" alt="{{ $recipe->name }}">
                <li lass="list-group-item">
                    <p>{{ $recipe->description }}</p>
                </li>
                <li class="list-group-item card-ingredients-header">Ингредиенты</li>
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
            </ul>
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
@endsection