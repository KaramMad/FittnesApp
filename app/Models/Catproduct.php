<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catproduct extends Model
{
    use HasFactory;
    protected
     $guarded=[''];

    public function products():HasMany{
        return $this->hasMany(Product::class,'category_id');
    }
    public function subCategories():HasMany{
        return $this->hasMany(Catproduct::class,'parent_id');
    }
    public function parent():BelongsTo{
        return $this->belongsTo(Product::class,'parent_id');
    }

}
