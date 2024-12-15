<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; //追記
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use HasFactory; //追記

    public function tests() //belongsToManyの場合は複数形（test[s]）
    {
        return $this->belongsToMany(Test::class);
    }

}
