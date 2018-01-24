<?php

namespace App\Dto;


interface RecipeInstructionDtoInterface
{
    public function stepNum(): int;

    public function text(): string;

    public function mediaUrl(): string;
}
