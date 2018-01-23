<?php

namespace App\Dto;


class RecipeDto implements RecipeDtoInterface
{
    /** Название рецепта или блюда */
    protected $name;
    /** Ингредиент рецепта и его объем, количество (может быть несколько) */
    protected $ingredients;
    /** Инструкция по приготовлению */
    protected $recipeInstructions;
    /** URL изображение */
    protected $image;
    /** Количество порций на выходе */
    protected $recipeYield;
    /** Время приготовления, указывается в формате ISO 8601, например: PT30M (30 минут) */
    protected $totalTime;
    /** Национальная кухня, к которой относится блюдо */
    protected $recipeCuisine;
    /** Краткое описание */
    protected $description;

    public function __construct(
        string $name,
        array $ingredients,
        array $recipeInstructions = [],
        string $image = '',
        int $recipeYield = 0,
        string $totalTime = '',
        string $recipeCuisine = '',
        string $description = ''
    )
    {
        $this->name = trim($name);
        $this->ingredients = $ingredients;
        $this->recipeInstructions = $recipeInstructions;
        $this->image = trim($image);
        $this->recipeYield = $recipeYield;
        $this->totalTime = trim($totalTime);
        $this->recipeCuisine = trim($recipeCuisine);
        $this->description = trim($description);

    }

    public function name(): string
    {
        return $this->name;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function totalTime(): string
    {
        return $this->totalTime;
    }

    public function recipeYield(): int
    {
        return $this->recipeYield;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function ingredients(): array
    {
        return $this->ingredients;
    }

    public function recipeInstructions(): array
    {
        return $this->recipeInstructions;
    }
}
