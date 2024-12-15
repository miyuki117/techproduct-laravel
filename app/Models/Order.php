<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tests'; // testテーブルを参照する


    protected $fillable = ['message','user_id']; // message,user_idへの書き込みを許可する

}
