<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;  // Carbonをインポート(datetimeを継承した日時を扱うクラス)



class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


         // バリデーション
        //  $request->validate([
        //     'start_date' => 'required|integer',
        //     'end_date' => 'required|integer',
        //     'event_name' => 'required|max:32',
        // ]);


        // fullcalendarからの登録処理
        // $calendar = new Calendar();
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        // $calendar->start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        // $calendar->end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
        // $calendar->event_name = $request->input('event_name');
        // $calendar->event_detail = ('(予定の詳細）');
        // $calendar->user_id = auth()->user()->id;  //ログイン情報からuserを取ってくる

        // $calendar->save();

        // $start_date = $request->start_date('Y-m-d') + $request->start_date_time('H:i:s'); //Y-m-d H:i:s形式にしたい
        // $end_date = $request->end_date('Y-m-d') + $request->end_date('H:i:s');

        
         Calendar::create([
            'start_date' => $request->start_date ,
            'start_time' => $request->start_time ,
            'end_date'=>$request->end_date,
            'end_time'=>$request->end_time,
            'event_name'=>$request->event_name,
            'event_detail'=>$request->event_detail,
            'user_id' =>auth()->user()->id,
        ]);

        // return redirect()->route('calendar.index');
         return redirect()->route('service.index'); //登録したら介護サービス画面へ
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        //  // 日付範囲内のイベントを取得
         $events = Calendar::all();

        // イベントをFullCalendarが期待する形式に変換して返す
        $events = $events->map(function ($event) {
        // start_date と start_time を結合
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date . ' ' . $event->start_time);
    
        // 同様に、end_date と end_time を結合
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->end_date . ' ' . $event->end_time);

            return [
                'title' => $event->event_name,
                'start' => $startDateTime->toIso8601String(), // start() メソッドを使用して日付と時刻を結合
                'end' => $endDateTime->toIso8601String(),     // end() メソッドを使用して日付と時刻を結合          
            ];

        });

        return response()->json($events);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Calendar $calendar)

    public function destroy(Calendar $calendar)
    {
        Gate::authorize('delete', $calendar);


        $calendar->delete();
        return redirect()->route('service.index');
    }





}
