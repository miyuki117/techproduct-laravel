<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;  // Carbonをインポート


class Calendar extends Model
{

    use HasFactory;

    protected $table = 'calendars'; // calendarテーブルを参照する

    protected $fillable = ['start_date','end_date','start_time','end_time','event_name','event_detail','user_id']; // 書き込みを許可する


    public function user() //berongsToの場合は単数形（user）
    {
        return $this->belongsTo(User::class);
    }

    // 開始日時を返す
    public function getStartAttribute()
    {
        // start_date と start_time を結合して Carbon インスタンスを作成
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date . ' ' . $this->start_time);
    }

    // 終了日時を返す
    public function getEndAttribute()
    {
        // end_date と end_time を結合して Carbon インスタンスを作成
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date . ' ' . $this->end_time);
    }


}
