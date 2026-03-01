<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    // Цей рядок дозволяє формі записувати дані в ці колонки
    protected $fillable = ['route', 'status']; 
}