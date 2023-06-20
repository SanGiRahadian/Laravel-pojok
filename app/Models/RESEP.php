<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RESEP extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_resep',
        'nama_pasien',
        'tgl_resep',
        'name_dokter',
        'no_sip' ,
        'penyusun',
    ];
    public function detail()
    {
        return $this->hasMany(RESEPDetail::class, 'no_resep', 'no_resep');
    }

    public function getManager()
    {
        return $this->belongsTo(User::class, 'name_dokter', 'id');
    }
}
