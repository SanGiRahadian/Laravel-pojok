<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokters extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resep',
        'id_product' ,
        'nama_obat',
        'jenis_obat',
        'bentuk_obat' ,
        'aturan_minum',      
         'price' ,
        'qty' ,
        'sub_total' ,
        ];
    
        public function getProduct()
        {
            return $this->belongsTo(Product::class, 'id_product', 'id');
        }
        
    }
    