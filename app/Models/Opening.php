<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    protected $guarded = [];
    protected $casts = ['posted_on' => 'date', 'apply_before' => 'date', 'is_open' => 'boolean'];
}
