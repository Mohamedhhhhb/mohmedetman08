<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsArbic extends Model
{
    protected $guarded = [];

    public function section_ar()
        {


             return $this->belongsTo(CatageriesArbic::class,'catageries_arbic_id');

          //  return $this->hasMany(,'catageries_id');



        }
    use HasFactory;
}
