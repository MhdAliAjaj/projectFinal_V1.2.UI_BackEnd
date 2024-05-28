<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    protected $guard_name = 'web';  //هاي مشان انو عم نضيف بالسيدر الادمن باكتر من جدول لذلك نحتاج الى اضافة هذا السطر
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthDate',
        'phone',
    ];

    //relations:
    //1.customer & order   One To Many
    public function ordersR(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    //2.customer & contact-form   one to many
    public function contact_formsR(): HasMany
    {
        return $this->hasMany(ContactForm::class);
    }

    //3.customer & user Many to one
    // public function userR(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }




    //هذا التعيديل لمكتبة السباتي 
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
