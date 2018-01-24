<?php

namespace App\Models;

use App\Dto\RecipeDtoInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recipe
 * @package App\Models
 * @property $url_id
 * @property $name
 * @property $image
 * @property $recipe_yield
 * @property $total_time
 * @property $recipe_cuisine
 * @property $description
 */
class Recipe extends Model
{
    //public $table = 'recipes';

    public $timestamps = false;

    public static function makeByRecipeDto(int $urlId, RecipeDtoInterface $recipeDto)
    {
        $model = new self;
        $model->url_id = $urlId;
        $model->name = $recipeDto->name();
        $model->image = $recipeDto->image();
        $model->recipe_yield = $recipeDto->recipeYield();
        $model->total_time = $recipeDto->totalTime();
        $model->recipe_cuisine = $recipeDto->recipeCuisine();
        $model->description = $recipeDto->description();
        $model->save();
        return $model;
    }
}
