<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function newssubcategory()
    {
        return $this->belongsTo(Newssubcategory::class,'category_id');
    }
}
