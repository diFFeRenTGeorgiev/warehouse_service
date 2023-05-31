<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Permission extends Model
{
    /**
     * roles
     * @return relationship object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class); //returns all roles associated with given permission id
    }
}
