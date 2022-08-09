<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'email',
        'no_tlp',
        'alamat',
    ];

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class);
    }
}
