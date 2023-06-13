<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasiens extends Model
{
    use HasFactory;

    protected $fillable = ['no_rekam_medis',
    'name',
    'nik',
    'tgl_lahir',
    'tgl_masuk',
    'penyakit',
    'email',
    'tlp',
    'alamat',
    'jenis_kelamin',
    'jenispenyakit',
    'dokter',
    'beratbadan',
    'tinggibadan',
];
}
