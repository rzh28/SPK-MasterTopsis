<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $table = 'karyawans';
    protected $fillable = [
        'nik',
        'name',
        'birthday',
        'gender',
        'agama',
        'status',
        'masaKerja',
        'gaji',
        'masuk',
    ];
    public function nilais()
    {
        return $this->belongsTo(Nilai::class, 'karyawans_id', 'id');
    }
}
