<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $fillable = [
        'name',
        'location',
        'description',
        'owner_id',
    ];

    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
