<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Wowfood.club',
            'url' => 'https://wowfood.club/',
            'handler' => '\App\SourceHandlers\HandlerInterface',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'https://wowfood.club/sitemap.xml',
        ]);


        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Кулинарный портал Kedem.ru',
            'url' => 'https://kedem.ru/',
            'handler' => '\App\SourceHandlers\KedemRuHandler',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'https://kedem.ru/sitemap.xml',
        ]);


        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Овкусе.ру',
            'url' => 'http://ovkuse.ru/',
            'handler' => '\App\SourceHandlers\OvkuseRuHandler',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'http://ovkuse.ru/sitemap.xml',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'http://ovkuse.ru/deti/sitemap.xml',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'http://ovkuse.ru/sitemap_ovkuse.xml',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'http://ovkuse.ru/ugcsitemap.xml',
        ]);


        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Еда.ру',
            'url' => 'https://eda.ru/',
            'handler' => '\App\SourceHandlers\EdaRuHandler',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'https://eda.ru/sitemap_index.xml',
        ]);


        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Едим дома',
            'url' => 'https://www.edimdoma.ru/',
            'handler' => '\App\SourceHandlers\EdimdomaRuHandler',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'https://www.edimdoma.ru/system/sitemap.xml.gz',
        ]);


        $sourceId = DB::table('sources')->insertGetId([
            'title' => 'Со Вкусом',
            'url' => 'https://sovkusom.ru/',
            'handler' => '\App\SourceHandlers\SovkusomRuHandler',
        ]);
        DB::table('source_sitemaps')->insert([
            'source_id' => $sourceId,
            'sitemap_url' => 'https://sovkusom.ru/sitemap.xml',
        ]);
    }
}
