<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'id',
        'tgl_pengajuan',
        'nama_lengkap',
        'nama_petugas',
        'kapasitas_or',
        'kapasitas_an',
        'status',
    ];


    public function user()
    {
        // Jika nama kolom foreign key adalah 'user_id'
        return $this->belongsTo(User::class, 'id');
    }
}