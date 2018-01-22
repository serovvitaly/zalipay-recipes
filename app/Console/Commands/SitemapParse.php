<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SitemapParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    protected $parserService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(\App\Services\SitemapsParserService $parserService)
    {
        parent::__construct();
        $this->parserService = $parserService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemaps = \App\Models\SourceSitemap::where('is_active', true)->get();

        foreach ($sitemaps as $sitemap) {

            $this->info($sitemap->sitemap_url);

            $urls = $this->parserService->getUrls($sitemap->sitemap_url);
            if (empty($urls)) {
                continue;
            }
            foreach ($urls as $url) {
                try {
                    \App\Models\SourceUrl::create([
                        'source_id' => $sitemap->source_id,
                        'source_sitemap_id' => $sitemap->id,
                        'url' => trim($url),
                    ]);
                } catch (\Exception $e) {
                    //
                }
            }
        }
    }
}
