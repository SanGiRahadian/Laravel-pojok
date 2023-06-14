<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RESEPDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resep',
        'jenis_obat',
        'bentuk_obat' ,
        'aturan_minum',      
         'price' ,
        'qty' ,
        'sub_total' ,
        ];
    
        public function getProduct()
        {
            return $this->belongsTo(Obat::class, 'nama_obat', 'id');
        }
        
    }
    