<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembuangan extends Model
{
    protected $table = 'pembuangan';
    protected $primaryKey = 'id_pembuangan';

    protected $fillable = [
        'id',
        'nama_petugas',
        'no_tlp_petugas',
        'kapasitas_an',
        'kapasitas_or',
        'nama_instansi',
        'tgl_pembuangan',
        'status',
    ];

    public function user()
    {
        // Jika nama kolom foreign key adalah 'user_id'
        return $this->belongsTo(User::class, 'id');
    }

    public function pengajuan()
    {
        // Jika nama kolom foreign key adalah 'user_id'
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
}
