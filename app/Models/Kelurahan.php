<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    public function Kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    use HasFactory;

    protected $table ='kelurahans';
    protected $fillable = ['id', 'nama', 'kecamatan_id'];
}
