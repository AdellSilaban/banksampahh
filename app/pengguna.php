<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{

    // use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';
  
    // public function posts()
    // {
        // return $this->hasMany(Post::class);
    // }

    protected $fillable = [
        'id_dtl_pengguna',
        'nama_lengkap',
        'no_tlp',
        'alamat',
        'latitude',
        'longitude',
    ];
}

