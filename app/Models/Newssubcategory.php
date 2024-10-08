<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newssubcategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function newscategory()
    {
        return $this->belongsTo(Newscategory::class,'category_id');
    }
}
