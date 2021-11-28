<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelasmapel extends Model
{
    protected $table='kelasmapel';
    protected $fillable = [
        'kodeMapel','kelas','idGuru'
    ];
    public $timestamps = false;
}
