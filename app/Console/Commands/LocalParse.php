<?php

namespace App\Console\Commands;

use App\Models\Source;
use App\Models\SourceUrl;
use App\Services\LocalParserService;
use App\SourceHandlers\HandlerInterface;
use App\Services\RecipePersistingService;
use Illuminate\Console\Command;


class LocalParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'local:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсер локальных сжатых файлов с контентом страниц';

    protected $parserService;
    protected $persistingService;

    /**
     * Create a new command instance.
     *
     * @param LocalParserService $parserService
     * @param RecipePersistingService $persistingService
     */
    public function __construct(LocalParserService $parserService, RecipePersistingService $persistingService)
    {
        parent::__construct();

        $this->parserService = $parserService;
        $this->persistingService = $persistingService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $handlers = array_map(
            function($handler){
                if (!class_exists($handler)) {
                    return null;
                }
                $handler = new $handler;
                if (!$handler instanceof HandlerInterface) {
                    return null;
                }
                return $handler;
            },
            array_pluck(Source::all()->toArray(), 'handler', 'id')
        );

        $urls = SourceUrl::where('has_recipe', 0)->where('source_id', 6)->get();

        /** @var SourceUrl $url */
        foreach ($urls as $url) {

            $this->info($url->url);

            if (!isset($handlers[$url->source_id])) {
                $url->has_recipe = -5;
                $url->save();
                continue;
            }

            $filePath = '/media/vi/Хранилище/DATA/recipes_data/'
                . $url->getHashPrefix() . '/'
                . $url->getHash() . '.html.gz';

            if (!file_exists($filePath)) {
                $url->has_recipe = -10;
                $url->save();
                continue;
            }

            try {
                $fileContent = file_get_contents($filePath);
            } catch (\Exception $e) {
                $url->has_recipe = -9;
                $url->save();
                continue;
            }

            if (empty($fileContent)) {
                $url->has_recipe = -8;
                $url->save();
                continue;
            }

            try {
                $content = gzdecode($fileContent);
            } catch (\Exception $e) {
                $url->has_recipe = -7;
                $url->save();
                continue;
            }

            $content = trim($content);

            if (empty($content)) {
                $url->has_recipe = -6;
                $url->save();
                continue;
            }

            /** @var HandlerInterface $handler */
            $handler = $handlers[$url->source_id];

            try {
                $recipeDto = $handler->getRecipeDtoByContent($content);
            } catch (\Exception $e) {
                $url->has_recipe = -3;
                $url->save();
                continue;
            }

            if (!$recipeDto) {
                $url->has_recipe = -1;
                $url->save();
                continue;
            }

            try {
                $this->persistingService->store($url->id, $recipeDto);
            } catch (\Exception $e) {
                $url->has_recipe = -4;
                $url->save();
                $this->info($e->getMessage());
                continue;
            }

            $url->has_recipe = 1;
            $url->save();
        }
    }
}
