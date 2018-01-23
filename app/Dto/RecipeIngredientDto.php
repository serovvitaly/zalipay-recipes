<?php

namespace App\Dto;


class RecipeIngredientDto
{
    protected $name;
    protected $value;

    public function __construct(string $name, string $value)
    {
        $this->name = trim($name);
        $this->value = trim($value);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }
}
