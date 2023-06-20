<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_obat', 
        'jenis_obat',
        'bentuk_obat',
        'aturan_minum',
        'price'

    ];
   
}
