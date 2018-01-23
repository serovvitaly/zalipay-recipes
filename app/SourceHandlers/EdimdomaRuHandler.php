<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDtoInterface;

class EdimdomaRuHandler implements HandlerInterface
{

    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface
    {
        return null;
    }
}
