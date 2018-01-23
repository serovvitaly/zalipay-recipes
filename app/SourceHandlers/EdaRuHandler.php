<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDtoInterface;

class EdaRuHandler implements HandlerInterface
{

    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface
    {
        return null;
    }
}
