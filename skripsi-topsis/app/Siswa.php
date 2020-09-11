<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'siswas';
    protected $fillable = [
        'name',
        'gender',
        'status',
    ];
}
