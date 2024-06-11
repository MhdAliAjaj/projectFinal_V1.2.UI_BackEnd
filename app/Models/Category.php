<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'user_id',

    ];

    //relations:
    //1.category & user   Many to one
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //2.category & service   One to Many
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
