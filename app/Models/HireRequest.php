<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    protected $fillable = [
        'freelancer_id', 'job_title', 'description',
        'duration', 'total_amount', 'status'
    ];

    // Each hire request belongs to one freelancer
    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}