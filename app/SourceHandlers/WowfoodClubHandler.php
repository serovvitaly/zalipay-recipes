<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDto;
use App\Dto\RecipeDtoInterface;
use App\Dto\RecipeIngredientDto;
use App\Dto\RecipeInstructionDto;
use Symfony\Component\DomCrawler\Crawler;

class WowfoodClubHandler implements HandlerInterface
{

    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface
    {
        if (strpos($content, 'itemprop="name"') === false) {
            return null;
        }

        $crawler = new Crawler($content);

        $recipeIngredients = [];
        $recipeIngredientsList = $crawler->filterXPath('//*[@itemprop="recipeIngredient"]');
        $recipeIngredientsList->each(function (Crawler $crawler) use (&$recipeIngredients) {
            $recipeIngredients[] = new RecipeIngredientDto(
                $crawler->filter('dd')->text(),
                $crawler->filter('dt')->text()
            );
        });

        $recipeInstructions = [];
        $recipeInstructionsList = $crawler->filterXPath('//*[@itemprop="recipeInstructions"]');
        $stepNum = 1;
        $recipeInstructionsList->each(function (Crawler $crawler) use (&$recipeInstructions, &$stepNum) {
            $image = '';
            if ($crawler->filter('img')->count()) {
                $image = $crawler->filter('img')->attr('src');
            }
            $recipeInstructions[] = new RecipeInstructionDto(
                $stepNum,
                $crawler->text(),
                $image
            );
            $stepNum++;
        });

        return new RecipeDto(
            $crawler->filterXPath('//h1[@itemprop="name"]')->text(),
            $recipeIngredients,
            $recipeInstructions,
            $crawler->filterXPath('//img[@itemprop="image"]')->attr('src'),
            $crawler->filterXPath('//*[@itemprop="recipeYield"]')->text(),
            $crawler->filterXPath('//*[@itemprop="cookTime"]')->attr('content'),
            $crawler->filterXPath('//*[@itemprop="recipeCuisine"]')->text(),
            $crawler->filterXPath('//*[@itemprop="description"]')->text()
        );
    }
}
