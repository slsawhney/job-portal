<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'description',
        'status',
        'employment_type',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
