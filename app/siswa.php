<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table='siswa';
    protected $fillable = [
        'namaSiswa','tanggalLahirSiswa','alamatSiswa','noTelpSiswa'
    ];
    public $timestamps = false;
}
