<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    protected $table = 'paket';
    
  
    // public function posts()
    // {
        // return $this->hasMany(Post::class);
    // }

    protected $fillable = [
        'id_paket',
        'nama_paket',
        'deskripsi',
        'kapasitas',
        'harga',
    ];
}

