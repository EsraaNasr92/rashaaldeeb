<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Relation between users and pages */
    public function pages(){
        return $this->hasMany('App\Models\Page');
    }

    public function services(){
        return $this->hasMany('App\Models\Services');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function portfolios(){
        return $this->hasMany('App\Models\Portfolio');
    }

    public function partners(){
        return $this->hasMany('App\Models\Partners');
    }

    public function menus(){
        return $this->hasMany('App\Models\Menu');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    public function isAdminOrEditor(){
        return $this->hasAnyRole(['admin', 'editor']);
    }

    public function hasAnyRole($roles){
        /*if(! $this->roles){
            return null;
        }
        return $this->roles()->whereIn('name', $roles)->first();*/

        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role){
        /*if(! $this->role){
            return null;
        }
        return $this->roles()->where('name', $role)->first();*/
        return null !== $this->roles()->where('name', $role)->first();
    }
}
