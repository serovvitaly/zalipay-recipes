<?php

namespace App\Services;


class PageCollectorService
{
    protected $dirPath;

    public function __construct($dirPath)
    {
        $this->dirPath = rtrim($dirPath, '/') . '/';
    }

    public function collectByUrl($url): bool
    {
        $url = trim(strtolower($url));
        $urlHash = md5($url);
        $urlPrefix = substr($urlHash, 0, 2);

        if (!file_exists($this->dirPath . $urlPrefix)) {
            mkdir($this->dirPath . $urlPrefix);
        }

        $filePath = $this->dirPath . $urlPrefix . '/' . $urlHash . '.html.gz';

        try {
            $content = file_get_contents($url);
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
