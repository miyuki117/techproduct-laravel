<?php

namespace App\Http\Controllers;

use App\Models\Toiawase;
use Illuminate\Http\Request;

class ToiawaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toiawases = Toiawase::all(); //select*from toiawase（ようにmodelに指示出している）
        // dd($toiawases); // 追記

        return view('toiawases', [
            'toiawases' => $toiawases //取得したtoiawasesを返却する(ようにviewに指示出している)
            // 'tags' => $tags //取得したtagを返却する

        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $toiawases = Toiawase::create([
            'message' => $request->message,
            'user_id'=> auth()->user()->id //赤字残っているけど大丈夫

        ]);

        // $tweet->tags()->attach($request->tags); // 追記

        return redirect()->route('toiawases.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Toiawase $toiawase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toiawase $toiawase)
    {
        // $selectedTags = $tweet->tags->pluck('id')->all();
        return view('edit', [
            'toiawase' => $toiawase,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toiawase $toiawase)
    {
        // メッセージ内容を更新
        $toiawase->update([
            'message' => $request->message
        ]);
            // ツイートに紐づいているタグを更新
        // $toiawase->tags()->sync($request->tags);
        return redirect()->route('toiawases.index'); //更新処理したらindexに戻る
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toiawase $toiawase)
    {
        // $toiawase->tags()->detach();
        $toiawase->delete();
        return redirect()->route('toiawases.index');

    }
}
