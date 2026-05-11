<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $primaryKey = 'trip_id';
    public $timestamps = false;

    protected $fillable = [
        'route_id', 
        'vehicle_id', 
        'departure_date', 
        'arrival_date', 
        'planned_departure', 
        'planned_arrival',
        'price' // Переконайся, що це тут
    ];
}