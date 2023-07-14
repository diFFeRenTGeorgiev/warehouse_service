<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type()
    {
        return $this->hasOne(Type::class);
    }

    public function attributes()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function types()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
//    public function categories()
//    {
//        return $this->belongsToMany(ProductCategory::class, 'product_category_product');
//    }
//
//
//
//    public function attributeChoices()
//    {
//        return $this->belongsToMany(AttributeChoice::class, 'product_attribute_choices');
//    }


    public function productFiles()
    {
        return $this->hasMany(ProductFile::class);
    }

}
