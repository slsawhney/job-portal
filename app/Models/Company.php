<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'owner_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
