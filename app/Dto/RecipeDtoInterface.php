<?php

namespace App\Dto;


interface RecipeDtoInterface
{
    public function name(): string;

    public function image(): string;

    public function totalTime(): string;

    public function recipeYield(): int;

    public function description(): string;

    public function ingredients(): array;

    public function recipeInstructions(): array;
}
