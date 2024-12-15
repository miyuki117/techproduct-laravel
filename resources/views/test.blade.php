<x-app-layout>

<x-slot name="header">
        <div class="justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('問い合わせ') }}
            </h2>
        </div>
 </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">




                <!-- 投稿フォーム 開始   ★新規投稿用の画面↓-->
                <form action="/inquiry" method="POST" class="card card-body shadow-2 mb-3">
                     @csrf
                    <div class="mb-2">
                        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">相談内容</p>
                        <div class="form-outline">
                            <textarea class="form-control" id="text-area" rows="3" name="message" placeholder="自由記入欄" required></textarea>
                        </div>
                    </div>

                    <div class="mb-2">
                        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">ユーザー名</p>
                        <div class="form-outline">
                            <textarea class="form-control" id="text-area" rows="3" name="user" placeholder="ユーザー名を記入" required></textarea>
                        </div>
                    </div>


                    {{-- タグ付け用チェックボックス ここから --}}
                    <div class="mb-2">
                        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">タグを選択</p>
                        <div class="form-outline mb-2">
                            @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag-checkbox{{$tag->id}}" name="tags[]" value="{{$tag->id}}" />
                                <label class="form-check-label" for="tag-checkbox2">{{$tag->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- タグ付け用チェックボックス ここまで --}}

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold">
                        送信
                    </button>
                </form> 
                <!-- 投稿フォーム 終了 ★新規投稿用の画面↑-->


             <!-- 引数testsを関数testにひとつずつ出している -->
                @foreach($tests as $test) 
                    <!-- ぼやき表示用カード 開始 -->
                    <div class="card card-body shadow-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <p>
                                <span class="font-weight-bold mr-2">{{ $test->user->name }}</span>
                                <span style="font-size: 0.8rem;">{{ $test->created_at }}</span>
                            </p>
                            

                            <!-- 編集・削除可能画面 -->
                            <div class="d-flex" style="z-index:2">
                                @can('update', $test)
                                    <a href="/inquiry/{{ $test->id }}/edit" class="btn btn-floating shadow-0">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                @endcan
                                @can('delete',$test)
                                    <form action="/inquiry/{{ $test->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-floating shadow-0">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                            <!-- 編集削除はここまで -->

                        </div>
                        <p class="card-text">
                            {{ $test->message }}
                        </p>

                        {{-- タグ情報を表示する --}}
                        <div>
                        <!-- testテーブルにあるtagを呼び出して表示 -->
                            @foreach($test->tags as $tag)
                                <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
                            @endforeach
                        </div>


                    </div>
                    <!-- ぼやき表示用カード 終了 -->
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>