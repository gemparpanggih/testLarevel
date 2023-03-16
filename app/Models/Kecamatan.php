<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function Kelurahan() {
        return $this->hasMany(Kelurahan::class);
    }

    use HasFactory;
}
