<?php

namespace App\Models;

use App\Dto\RecipeInstructionDtoInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecipeInstruction
 * @package App\Models
 * @property $recipe_id
 * @property $step_num
 * @property $text
 * @property $media_url
 */
class RecipeInstruction extends Model
{
    public $timestamps = false;

    public static function makeByRecipeDto(int $recipeId, RecipeInstructionDtoInterface $instructionDto)
    {
        $model = new self;
        $model->recipe_id = $recipeId;
        $model->step_num = $instructionDto->stepNum();
        $model->text = $instructionDto->text();
        $model->media_url = $instructionDto->mediaUrl();
        $model->save();
        return $model;
    }
}
