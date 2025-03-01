<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'tx_ref',
        'name',
        'email',
        'phone',
        'user_id',
        'amount_paid',
    ];
}
