<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'location',
        'description',
        'status',
        'employment_type',
        'company_id',
    ];

    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
