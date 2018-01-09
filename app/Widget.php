<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'widgets_index';
    }

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
