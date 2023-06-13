<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RESEP extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_resep',
        'name_pasien',
        'tgl_resep',
        'tgl_lahir',
        'name_dokter',
        'no_sip' ,
        'alamat',
        'riwayat_alergi',
        'tgl_pembuatan_resep',
        'penyusun',
        'total'
    ];
}