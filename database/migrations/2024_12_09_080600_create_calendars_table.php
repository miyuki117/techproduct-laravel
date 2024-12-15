<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->comment('開始日'); //追加
            // $table->datetime('start_date')->comment('開始日'); //追加
            $table->time('start_time')->comment('開始時刻'); //追加

            $table->date('end_date')->comment('終了日'); //追加
            // $table->datetime('end_date')->comment('終了日'); //追加
            $table->time('end_time')->comment('終了時刻'); //追加


            $table->string('event_name')->comment('イベント名'); //追加
            $table->string('event_detail')->comment('イベント詳細'); //追加
            $table->foreignId('user_id')->constrained(); //usertableのid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
