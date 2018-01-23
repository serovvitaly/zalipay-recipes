<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SourceUrl
 * @package App\Models
 * @property $source_id
 * @property $source_sitemap_id
 * @property $url
 * @property $has_recipe
 */
class SourceUrl extends Model
{
    public $timestamps = false;

    public $fillable = ['source_id', 'source_sitemap_id', 'url', 'has_recipe'];

    public function getHash(): string
    {
        return md5(trim(strtolower($this->url)));
    }

    public function getHashPrefix(): string
    {
        return substr($this->getHash(), 0, 2);
    }
}
