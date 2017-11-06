<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingEmail extends Model
{
    protected $table = 'marketing_emails';

    protected $fillable = [
        'email',
        'active',
        'hash',
    ];
}
