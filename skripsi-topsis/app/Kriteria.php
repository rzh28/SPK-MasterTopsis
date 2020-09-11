<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'kriterias';
    protected $fillable = [
        'name',
        'w'
    ];

    public function nilais()
    {
        $this->belongsTo(Nilai::class, 'kriterias_id', 'id');
    }
}
