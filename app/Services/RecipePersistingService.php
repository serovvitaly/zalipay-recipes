<?php

namespace App\Services;


use App\Dto\RecipeDtoInterface;
use App\Models\RecipeIngredient;
use App\Models\RecipeInstruction;

class RecipePersistingService
{
    public function store(int $urlId, RecipeDtoInterface $recipeDto)
    {
        \DB::transaction(function () use ($urlId, $recipeDto) {

            if (!count($recipeDto->ingredients())) {
                throw new \Exception('Список ингридиентов пуст');
            }

            $recipeModel = \App\Models\Recipe::makeByRecipeDto($urlId, $recipeDto);

            foreach ($recipeDto->ingredients() as $ingredient) {
                RecipeIngredient::makeByRecipeIngredientDto($recipeModel->id, $ingredient);
            }
            foreach ($recipeDto->recipeInstructions() as $instruction) {
                RecipeInstruction::makeByRecipeDto($recipeModel->id, $instruction);
            }
        });
    }
}
