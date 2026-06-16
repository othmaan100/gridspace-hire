<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $fillable = [
        'name', 'title', 'skills', 'hourly_rate',
        'rating', 'bio', 'avatar', 'jobs_completed'
    ];

    protected $casts = [
        'skills' => 'array',   // auto converts JSON to PHP array
        'hourly_rate' => 'decimal:2',
        'rating' => 'decimal:1',
    ];

    // One freelancer has many past projects
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // One freelancer has many hire requests
    public function hireRequests()
    {
        return $this->hasMany(HireRequest::class);
    }
}