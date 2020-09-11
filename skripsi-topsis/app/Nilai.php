<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'nilais';
    protected $fillable = [
        'nilai',
        'kriterias_id',
        'karyawans_id'
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'karyawans_id');
    }
    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'kriterias_id');
    }
}
