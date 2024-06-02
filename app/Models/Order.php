<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'customer_id',
        'service_id',
        'describtion',
        'status',
    ];

    //relations:
    //1.order & service Many to one
    public function serviceR(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    //2.order & customer Many to one
    public function customerR(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
