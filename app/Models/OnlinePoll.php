<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePoll extends Model
{
    use HasFactory;

   
    protected $fillable = ['language', 'question', 'yes_vote','no_vote'];

    public function scopeWithLocalize($query)
    {
        return $query->where([
            'language' => getLangauge()
        ]);
    }
}
