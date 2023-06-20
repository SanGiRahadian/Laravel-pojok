<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RESEPDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resep',
        'id_obat',
        'aturan_minum',      
        'price' ,
        'qty' ,
        'sub_total' ,
        ];
    
        public function getObat()
        {
            return $this->belongsTo(Obat::class, 'id_obat', 'id');
        }
      
    }
    