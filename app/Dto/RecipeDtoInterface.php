<?php

namespace App\Dto;


interface RecipeDtoInterface
{
    public function name(): string;

    public function image(): string;

    public function totalTime(): string;

    public function recipeYield(): string;

    public function description(): string;

    /**
     * @return RecipeIngredientDtoInterface[]
     */
    public function ingredients(): array;

    /**
     * @return RecipeInstructionDtoInterface[]
     */
    public function recipeInstructions(): array;

    public function recipeCuisine(): string;
}
