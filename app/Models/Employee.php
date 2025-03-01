<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "table_employee";

    protected $fillable = [
        "name",
        "department",
        "age",
        "salary",
        "image_path",
        "descriptgion",
        "is_active"
    ];
}
