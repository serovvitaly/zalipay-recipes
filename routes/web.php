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
        'recipes' => \App\Models\Recipe::paginate(5),
    ]);
})->where([
    'recipeId' => '\d+'
]);

Route::get('dmca', function () {
    return view('default.dmca');
});

Route::get('/img/{width}x{height}/{image}', function (int $width, int $height, string $imageName) {

    $dirPath = base_path() . "/public/img/{$width}x{$height}/";
    if (!file_exists($dirPath)) {
        mkdir($dirPath);
    }
    $filePath = base_path() . '/public/img/origin/' . $imageName;


    $imageManager = new \Intervention\Image\ImageManager(['driver' => 'gd']);

    $image = $imageManager->make($filePath)->widen($width)->crop($width, $height, 0, 0);

    $image->save($dirPath . $imageName);

    return $image->response('jpg');
});
