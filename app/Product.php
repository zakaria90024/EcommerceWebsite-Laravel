<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected  $fillable = ['product_price','product_name','product_discreption','product_quantity','alart_quantity','product_image'];

    protected $dates = ['deleted_at'];

    function relationtocategory()
    {
      return $this->hasOne('App\Category', 'id', 'category_id');
    }

}
