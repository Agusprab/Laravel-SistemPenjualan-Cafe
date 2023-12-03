<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    
    protected $guarded = ['id'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

 
}
