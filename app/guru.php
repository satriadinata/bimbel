<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table='guru';
    protected $fillable = [
        'namaGuru','tanggalLahirGuru','alamatGuru','noTelpGuru'
    ];
    public $timestamps = false;
}
