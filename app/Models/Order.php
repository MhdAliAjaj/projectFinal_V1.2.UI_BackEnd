<?php

namespace App\Models;

use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'user_id',
        'service_id',
        'description',
        'status',
        'date',
    ];

    //relations:
    //1.order & service Many to one
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    //2.order & customer Many to one
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
