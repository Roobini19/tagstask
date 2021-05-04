<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $table = "enroll";

    protected $fillable = ['name', 'email', 'mobile', 'basic', 'hra', 'special_allowance', 'pf_deuction', 'total_earnings'];

    protected $hidden = ['created_at', 'updated_at'];
}
