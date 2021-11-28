<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regristasi extends Model
{
    protected $table='registrasikelas';
    protected $fillable = [
        'idSiswa','idKelasMapel','nilaiAkhir','predikat'
    ];
    public $timestamps = false;
}
