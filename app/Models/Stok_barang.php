<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_barang extends Model
{
    use HasFactory;
    protected $table = 'stok_barang';
    protected $guarded = ['id'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
