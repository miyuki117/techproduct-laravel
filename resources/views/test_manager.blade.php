<x-app-layout>

<x-slot name="header">
        <div class="justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('問い合わせ一覧') }}</a>
            </h2>

        </div>
 </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">

             <!-- 引数testsを関数testにひとつずつ出している -->

                @foreach($tests as $test) 
                    <!-- ぼやき表示用カード 開始 -->
                    <div class="card card-body shadow-6 mb-2">
                        <div class="d-flex justify-content-between">
                            <p>
                                <span class="font-weight-bold mr-2 text-cyan-500">{{ $test->user->name }}</span>
                                <span class="text-cyan-500" style="font-size: 0.8rem;">{{ $test->created_at }}</span>
                            </p>
                            

                            <!-- 編集・削除可能画面 -->
                            <div class="d-flex" style="z-index:2">
                                <!-- update権限 -->
                                @if($test->manager_message == 'コメント未入力')
                                    <a href="/inquiry/{{ $test->id }}/manager_edit" class="btn btn-primary shadow-0">
                                        返信する
                                    </a>
                                @elseif($test->manager_message != 'コメント未入力')
                                    <p>
                                        返信済み
                                    </p>
                                @endif

                            </div>
                            <!-- 編集削除はここまで -->

                        </div>
                        <p class="card-text">
                            <p class="font-bold text-cyan-500">利用者コメント:{{ $test->message }}</p>
                        </p>
                        <p class="card-text">
                        @if($test->manager_message == 'コメント未入力')
                        <p class="font-bold text-red-600"> ケアマネコメント: {{ $test->manager_message }}</p>
                        @elseif($test->manager_message != 'コメント未入力')
                        <p class="font-bold"> ケアマネコメント: {{ $test->manager_message }}</p>
                        @endif

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