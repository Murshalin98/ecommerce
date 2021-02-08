<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Names extends Model
{
    protected $fillable = [
        'name','mean','gender','religion','country','about','updated_at'
    ];
}
