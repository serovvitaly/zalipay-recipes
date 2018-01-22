<?php

namespace App\Services;


class SitemapsParserService
{
    public function getUrls($sitemapUrl): array
    {
        if (pathinfo($sitemapUrl, PATHINFO_EXTENSION) === 'gz') {
            $sitemapXml = simplexml_load_string(gzdecode(file_get_contents($sitemapUrl)));
        } else {
            $sitemapXml = simplexml_load_file($sitemapUrl);
        }

        $urls = [];

        if ($sitemapXml->sitemap->count()) {
            foreach ($sitemapXml->sitemap as $simple) {
                $urls = array_merge($urls, $this->getUrls($simple->loc));
            }
        }

        if ($sitemapXml->url->count()) {
            foreach ($sitemapXml->url as $url) {
                $urls[] = (string)$url->loc;
            }
        }

        return $urls;
    }
}
