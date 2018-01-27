<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImageDownload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загружает картинки для рецептов с внешних источников';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipes = \App\Models\Recipe::all();
        foreach ($recipes as $index => $recipe) {
            $this->info($index . '. ' . $recipe->image);
            $filePath = base_path() . '/public/img/origin/' . md5($recipe->image)
                . '.' . strtolower(pathinfo($recipe->image, PATHINFO_EXTENSION));
            //$this->info($filePath);
            try {
                $content = file_get_contents($recipe->image);
                file_put_contents($filePath, $content);
            } catch (\Exception $e) {
                //
            }

        }
    }
}
