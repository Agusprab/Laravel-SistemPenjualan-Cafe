<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use SoftDeletes,HasFactory;
   protected $table = 'pegawai';
   protected $fillable = ['name','email', 'username', 'password', 'role'];
   protected $hidden;
}
