<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('default.recipes.list', [
        'recipes' => \App\Models\Recipe::paginate(12),
    ]);
});

Route::get('recipe{recipeId}', function (int $recipeId) {

    $recipe = \App\Models\Recipe::findOrFail($recipeId);

    return view('default.recipes.card', [
        'recipe' => $recipe,
    ]);
})->where([
    'recipeId' => '\d+'
]);

Route::get('dmca', function () {
    return view('default.dmca');
});

Route::get('/img/{width}x{height}/{image}', function (int $width, int $height, string $image) {
    return $width . 'x' . $height . '/' . $image;
});
