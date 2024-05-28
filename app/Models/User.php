<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name',
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
        'password' => 'hashed',
    ];
    /**
     * Get all of the customers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //relation :
    // //1.user & customer   One To Mane
    // public function customersR(): HasMany
    // {
    //     return $this->hasMany(Customer::class);
    // }

    
    //2.user & service   One To Mane
    public function servicesR(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    //3.user & category   One To Mane
    public function categorysR(): HasMany
    {
        return $this->hasMany(Category::class);
    }



    // relation spatie
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}
