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


            <!-- 利用者用の画面 -->
             <!-- 引数testsを関数testにひとつずつ出している -->
                @foreach($tests as $test) 
                @can('update', $test)
                    <!-- ぼやき表示用カード 開始 -->
                    <div class="card card-body shadow-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <p>
                                <span class="font-weight-bold mr-2">{{ $test->user->name }}</span>
                                <span style="font-size: 0.8rem;">{{ $test->created_at }}</span>
                            </p>
                            

                            <!-- 編集・削除可能画面 -->
                            <div class="d-flex" style="z-index:2">
                                <!-- update権限 -->
                                @can('update', $test) 
                                    <a href="/inquiry/{{ $test->id }}/edit" class="btn btn-floating shadow-0">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                @endcan
                                <!-- 削除権限 -->
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


                        <p class="card-text text-cyan-500">
                           【ケアマネコメント】 {{ $test->manager_message }}
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
                @endcan
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>