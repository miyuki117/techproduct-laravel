<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Find;
use Illuminate\Support\Facades\Auth;

use App\Models\Test;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\InformationNotification;
use App\Http\Requests\Auth\LoginRequest;

use App\Providers\AuthServiceProvider;

use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $this->authorize('view', $test); // 追記
        $tests = Test::all(); 
        $tags = Tag::all(); //tagテーブルからselect*from tags

        // ログイン中のユーザーを取得
        $user = Auth::user();

        return view('test_user', [ //test.bladeに
            'tests' => $tests, //取得したtestsを引数（tests）で渡す返却する
            'tags' => $tags, //取得したtagを返却する
            'user' =>$user
        ]);



    }

    public function index2()
    {

        // $this->authorize('view', $test); // 追記
        // $tests = Test::all(); 
        $tests = Test::paginate(5);



        // return view('test_user2', [ //test.bladeに
        //     'tests' => $tests, //取得したtestsを引数（tests）で渡す返却する
        // ]);

        return view('test_user2',compact('tests'));

    }

    public function index_mng()
    {

        $tests = Test::all(); 

        return view('test_manager', [ //test.bladeに
            'tests' => $tests, //取得したtestsを引数（tests）で渡す返却する
        ]);
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
        //投稿内容の登録
        $test = Test::create([
            'message' => $request->message, //requestからmessageを取ってくる
            'user_id'=> auth()->user()->id,  //ログイン情報からuserを取ってくる
            'manager_message' => 'コメント未入力'
        ]);
        $test->tags()->attach($request->tags); //tag情報の登録

        return redirect()->route('test.index2');

    }

    public function store_service(Request $request)
    {

        return view('test_user', [ //test.bladeに
            'service' =>($request), //tag情報の登録
        ]);

    }






    // 問い合わせが追加されたことを知らせる
    public function notify(Request $request)
    {
        $user = RegisteredUser::find($request->user); //userに入れるのはController名みたい。ということは？？
        $user->notify(new InformationNotification('message')); //通知する。→InformationNotificationへ
        

    
    }


    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {

        Gate::authorize('update', $test);


        $tags = Tag::all(); //tagは更新画面に選択肢すべて出すため、select*from tag_table
        $selectedTags = $test->tags->pluck('id')->all(); //中間テーブルからtagのidをとってくる

        return view('edit_test', [
            'test' => $test,
            'tags' =>$tags,
            'selectedTags'=>$selectedTags
        ]);

    }

    // マネージャー編集用
    public function manager_edit(Test $test)
    {

        if (!$test) {
            return redirect()->route('test.index')->with('error', 'Test not found');
        }

        $tags = Tag::all(); //tagは更新画面に選択肢すべて出すため、select*from tag_table
        $selectedTags = $test->tags->pluck('id')->all(); //中間テーブルからtagのidをとってくる

        return view('manager_edit_test', [
            'test' => $test,
            'tags' =>$tags,
            'selectedTags'=>$selectedTags
        ]);

    }

    public function manager_update(Request $request, Test $test)
    {
        // メッセージ内容を更新
        $test->update([
        'manager_message' => $request->manager_message //ケアマネのコメントにする(★カラムも書き換える）
        ]);    
        
        return redirect()->route('test.index_mng'); //更新処理したらindex2に戻る

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        Gate::authorize('update', $test);

        // メッセージ内容を更新
        $test->update([
        'message' => $request->message
        ]);
        // タグを更新
        $test->tags()->sync($request->tags);
        return redirect()->route('test.index2'); //更新処理したらindex2に戻る
           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        Gate::authorize('delete', $test);


        $test->tags()->detach();
        $test->delete();
        return redirect()->route('test.index2');
    }
}
