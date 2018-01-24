<?php

namespace App\Dto;


interface RecipeIngredientDtoInterface
{
    public function name(): string;

    public function value(): string;
}
