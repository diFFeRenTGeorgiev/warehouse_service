<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type()
    {
        return $this->hasOne(Type::class);
    }

}
