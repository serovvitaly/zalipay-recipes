<?php

namespace App\Services;


use App\Models\SourceUrl;

class PageCollectorService
{
    protected $dirPath;

    public function __construct($dirPath)
    {
        $this->dirPath = rtrim($dirPath, '/') . '/';
    }

    public function collectByUrl(SourceUrl $url): bool
    {
        $urlPrefix = $url->getHashPrefix();

        if (!file_exists($this->dirPath . $urlPrefix)) {
            mkdir($this->dirPath . $urlPrefix);
        }

        $filePath = $this->dirPath . $urlPrefix . '/' . $url->getHash() . '.html.gz';

        try {
            $content = file_get_contents($url->url);
        } catch (\Exception $e) {
            return false;
        }

        $content = trim($content);

        if (empty($content)) {
            return false;
        }

        $content = gzencode($content, 9);

        try {
            file_put_contents($filePath, $content);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
