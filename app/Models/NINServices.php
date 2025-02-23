<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NINServices extends Model
{
    use HasFactory;

    protected $table = 'nin_services';

    protected $fillable = [
        'name',
        'slug',
        'details',
        'amount'
    ];
}
