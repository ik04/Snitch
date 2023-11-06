<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViceCounter extends Model
{
    use HasFactory;
    protected $fillable =[
        "vice_id",
        "count"
    ];
}
