<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table='mapel';
    protected $fillable = [
        'kodeMapel','namaMapel'
    ];
    public $timestamps = false;
}
