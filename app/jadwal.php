<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table='jadwal';
    protected $fillable = [
        'hari','sesi','idKelasMapel'
    ];
    public $timestamps = false;
}
