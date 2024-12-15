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
              <table class="table table-striped">
                <thead>
                    <tr>
                        <td>no.</td>
                        <td>名前</td>
                        <td>メッセージ</td>
                        <td>更新時間</td>
                        <td>ステータス</td>
                    </tr>
                </thead>
                @foreach($tests as $test) 
                    @can('update', $test)
                    <tr>
                        <td></td>
                        <td>{{$test->user->name}}</td> 
                        <td>{{$test->message}}</td> 
                        <td>{{ $test->created_at}}</td>
                        <td>
                        <a href="/inquiry/{{ $test->id }}/edit" class="btn btn-floating shadow-0">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        </td>
                        <td>
                            <form action="/inquiry/{{ $test->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-floating shadow-0">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endcan

                @endforeach
            </table>
            {{$tests->links()}}

            </div>
        </div>
    </div>
</x-app-layout>