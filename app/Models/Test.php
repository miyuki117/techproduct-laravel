<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable; //通知で追加
use Illuminate\Notifications\Notifiable; //通知で追加

use App\Notifications\InformationNotification; //通知で追加


class Test extends Model
{
    protected $table = 'tests'; // testテーブルを参照する


    protected $fillable = ['message','user_id','manager_message']; // message,user_idへの書き込みを許可する

    
    public function user() //berongsToの場合は単数形（user）
    {
        return $this->belongsTo(User::class);
    }


    public function tags() //belongsToManyの場合は複数形（tag[s]）
    {
        return $this->belongsToMany(Tag::class);
    }



}

