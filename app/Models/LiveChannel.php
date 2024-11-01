<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveChannel extends Model
{
    use HasFactory;
    public function scopeWithLocalize($query)
    {
        return $query->where([
            'language' => getLangauge()
        ]);
    }
}
