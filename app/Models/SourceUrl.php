<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceUrl extends Model
{
    public $timestamps = false;

    public $fillable = ['source_id', 'source_sitemap_id', 'url', 'has_recipe'];
}
