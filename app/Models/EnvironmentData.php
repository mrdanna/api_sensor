<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentData extends Model
{
    use HasFactory;

    protected $table = 'environment_data'; // Nama tabel yang digunakan

    protected $fillable = [
        'sensor_name',
        'pollution_level',
        'temperature',
        'water_quality'
    ];
}
