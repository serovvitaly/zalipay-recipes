<?php

namespace App\Console\Commands;

use App\Models\SourceUrl;
use App\Services\PageCollectorService;
use Illuminate\Console\Command;

class PagesCollect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pages:collect {sitemapId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    protected $collectorService;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->collectorService = new PageCollectorService('/media/vi/Хранилище/DATA/recipes_data');
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $urls = SourceUrl::where('source_sitemap_id', $this->argument('sitemapId'));

        foreach ($urls->get() as $urlModel) {
            $this->collectorService->collectByUrl($urlModel->url);
        }
    }
}
