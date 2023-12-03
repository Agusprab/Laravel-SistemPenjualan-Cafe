<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillabale = ['kode_supplier','nama_supplier', 'alamat_supplier', 'no_tlp'];
    protected $guarded = ['id'];
}
