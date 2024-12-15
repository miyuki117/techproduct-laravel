<x-app-layout>

<x-slot name="header">
 @vite(['resources/css/app.css', 'resources/js/app.js'])

        <div class="justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('問い合わせ') }}
            </h2>
        </div>
 </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">

        <!-- ケアマネ用の表示 -->
            @if($user->flg == '1')
            <div class="justify-center"><a href="/inquiry_manager" class="btn btn-primary btn-block shadow-0">利用者の投稿一覧を見る</a></div>
           
        <!-- 利用者用の表示 -->
            @elseif($user->flg != '1')
            <!-- 投稿フォーム 開始   ★新規投稿用の画面↓-->
                <form action="/inquiry" method="POST" class="card card-body shadow-2 mb-3">
                     @csrf
                    <div class="mb-2">
                        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">相談内容</p>
                        <div class="form-outline">
                            <textarea class="form-control" id="text-area" rows="3" name="message" placeholder="自由記入欄" required>
                            </textarea>
                        </div>
                    </div>

                    {{-- タグ付け用チェックボックス ここから --}}
                    <!-- <div class="mb-2">
                        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">タグを選択</p>
                        <div class="form-outline mb-2">
                            @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag-checkbox{{$tag->id}}" name="tags[]" value="{{$tag->id}}" />
                                <label class="form-check-label" for="tag-checkbox2">{{$tag->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div> -->
                    {{-- タグ付け用チェックボックス ここまで --}}

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold">
                        送信
                    </button>
                </form> 
                <!-- 投稿フォーム 終了 ★新規投稿用の画面↑-->
            <div><a href="/inquiry_post">過去の一覧を見る</a></div>

            @endif

            </div>
        </div>
    </div>
</x-app-layout>