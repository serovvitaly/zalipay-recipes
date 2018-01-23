<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDtoInterface;

class OvkuseRuHandler implements HandlerInterface
{

    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface
    {
        return null;
    }
}
