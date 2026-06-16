<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'freelancer_id', 'title', 'description',
        'client_name', 'amount_earned', 'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'date',
    ];

    // Each project belongs to one freelancer
    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}