<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDtoInterface;

interface HandlerInterface
{
    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface;
}
