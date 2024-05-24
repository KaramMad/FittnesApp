<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FocusArea extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    public function exercises(){
        return $this->belongsToMany(Exercise::class,'exercise_focus_area');
    }
}
