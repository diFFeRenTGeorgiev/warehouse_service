<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne('App\Role');
    }
    public function phones()
    {
        return $this->hasMany(UserPhone::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderFeedbacks()
    {
        return $this->hasMany(OrderFeedback::class);
    }

    public function orderUserActivities()
    {
        return $this->hasMany(OrderUserActivity::class);
    }

    public function getLastPhone()
    {
        return $this->phones()->get()->last();
    }

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_users');
    }

    /**
     * Finds last order with address and parses it as address attributes array
     *
     * @return array
     */


    /*
    $user->roles //returns collection of user roles; type object(Illuminate\Database\Eloquent\Collection)
    $user->roles() // belongsToMany ralationship
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class); //returns relationship object
    }

    /**
     * hasRole
     *
     * @param  sting|collection $role
     *
     * @return true|false
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role); //if user is assotiated with role with name '...'
        }

        //if argument is type collection
        foreach ($role as $r) {
            if ($this->hasRole($r->name)) { //recursion
                return true;
            }
        }

        return false;
    }

    /* USE
    $user=auth()->loginUsingId(1); //simulate login
    $role = Role::find(1); //get role with id=1
    $user->assignRole($role);
     */
    public function assignRole($role)
    {
        //check if role is already assigned first
        if ($this->roles()->where('role_id', $role->id)->where('user_id', $this->id)->exists() === false) {
            $this->roles()->save($role); //(SQL: insert into `role_user` (`role_id`, `user_id`) values (1, 2))
        }
    }

    /* USE
    $user=auth()->loginUsingId(1); //simulate login
    $role = Role::find(1); //get role with id=1
    $user->assignRole($role);
     */
    public function revokeRole($role)
    {
        $this->roles()->detach();
    }

    /**
     * isRegularUser - ako nqma assign-ati roli, znachi nqma nikakvi specialni permissions, znachi e obiknoven potrebitel - klient
     *
     * @return boolean
     */
    public function isRegularUser()
    {
        if(count($this->roles)>0) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * @return bool
     */
    public function hasAnyRole()
    {
//        if($this->role_id != null){
//            return true;
//        }
//
//        return false;
        if(Auth::check() && $this->role_id != null){
            return true;
        }

        return false;
    }
}
