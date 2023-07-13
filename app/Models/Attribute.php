<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{//
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
