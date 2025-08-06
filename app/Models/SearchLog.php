<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $fillable = [
        'keywords',
        'location',
        'ip_address',
        'user_agent',
    ];
}
