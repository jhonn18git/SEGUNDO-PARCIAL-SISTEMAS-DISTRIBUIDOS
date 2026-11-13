<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidas extends Model
{
    /** @use HasFactory<\Database\Factories\SalidasFactory> */
    use HasFactory;
    protected $fillable=['ci','precio','cantidad'];
}
