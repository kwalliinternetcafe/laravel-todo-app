<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Domin bada damar mass assignment
    protected $fillable = [
        'title',
        'completed',
    ];
}

