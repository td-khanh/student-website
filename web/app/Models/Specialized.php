<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialized extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status','admin_id'
    ];
}
