<?php

namespace App\Models;

use App\Dto\RecipeIngredientDtoInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecipeIngredient
 * @package App\Models
 * @property $recipe_id
 * @property $name
 * @property $value
 */
class RecipeIngredient extends Model
{
    //public $table = 'ingredients';

    public $timestamps = false;

    public static function makeByRecipeIngredientDto(int $recipeId, RecipeIngredientDtoInterface $ingredientDto)
    {
        $model = new self;
        $model->recipe_id = $recipeId;
        $model->name = $ingredientDto->name();
        $model->value = $ingredientDto->value();
        $model->ingredient_id = 1;
        $model->save();
        return $model;
    }
}
