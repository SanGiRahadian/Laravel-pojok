<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokters extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' => 'required',
        'no_sip',
        'email',
        'tgl_diterima',
        'no_tlp',
        'alamat',
        'spesialisasi',
    ];
}
