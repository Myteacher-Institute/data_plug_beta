<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NINServicesRequest extends Model
{
    use HasFactory;

    protected $table = 'nin_services_request';

    protected $guarded = [];
}
