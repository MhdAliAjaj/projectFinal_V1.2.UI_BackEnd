<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Service extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'title',
        'details',
        'price',
        'category_id',
        'user_id',
    ];

    //relations:
    //1.service & order   One To Many
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    //2.service & category   Many To One
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    //3.service & user   Many To One
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
