<?php

namespace App\SourceHandlers;


use App\Dto\RecipeDto;
use App\Dto\RecipeDtoInterface;
use App\Dto\RecipeIngredientDto;
use App\Dto\RecipeInstructionDto;
use Symfony\Component\DomCrawler\Crawler;

class SovkusomRuHandler implements HandlerInterface
{
    protected function prepareImage(string $imageUrl): string
    {
        $imageUrl = trim($imageUrl);

        if (empty($imageUrl)) {
            return '';
        }

        $imageUrlHost = parse_url($imageUrl, PHP_URL_HOST);
        if (!$imageUrlHost) {
            $imageUrl = 'https://sovkusom.ru' . $imageUrl;
        }
        return $imageUrl;
    }

    public function getRecipeDtoByContent(string $content): ?RecipeDtoInterface
    {
        if (strpos($content, 'itemprop="name"') === false) {
            return null;
        }

        $crawler = new Crawler($content);

        /** Ингредиенты */
        $recipeIngredients = [];
        $recipeIngredientsList = $crawler->filter('div.ingredients-container');
        if (!$recipeIngredientsList->count()) {
            return null;
        }
        $recipeIngredientsList->each(function (Crawler $crawler) use (&$recipeIngredients) {
            $recipeIngredients[] = new RecipeIngredientDto(
                $crawler->filter('dt')->text(),
                $crawler->filter('dd')->text()
            );
        });

        /** Шаги инструкции */
        $recipeInstructions = [];
        $recipeInstructionsList = $crawler->filterXPath('//*[@itemprop="recipeInstructions"]/ol/li/span');
        if (!$recipeInstructionsList->count()) {
            return null;
        }
        $stepNum = 1;
        $recipeInstructionsList->each(function (Crawler $crawler) use (&$recipeInstructions, &$stepNum) {
            $image = '';
            if ($crawler->filter('img')->count()) {
                $image = $crawler->filter('img')->attr('src');
            }
            $recipeInstructions[] = new RecipeInstructionDto(
                $stepNum,
                $crawler->text(),
                $this->prepareImage($image)
            );
            $stepNum++;
        });

        /** Количество порций */
        $numberPeoplesSiblings = $crawler->filter('i.number-peoples')->siblings();
        preg_match('/Порций: (.*)/', $numberPeoplesSiblings->first()->text(), $numberPeoplesMatches);


        return new RecipeDto(
            $crawler->filterXPath('//h1[@itemprop="name"]')->text(),
            $recipeIngredients,
            $recipeInstructions,
            $this->prepareImage($crawler->filterXPath('//img[@itemprop="image"]')->attr('src')),
            $numberPeoplesMatches[1],
            $crawler->filterXPath('//*[@itemprop="cookTime"]')->attr('content'),
            '',
            ''
        );
    }
}
