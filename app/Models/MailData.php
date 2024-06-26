<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailData extends Model
{
    use HasFactory;

    protected $fillable = ['employee_email', 'customer_email', 'message'];
}
