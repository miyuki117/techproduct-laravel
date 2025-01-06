<x-app-layout>
    <x-slot name="header">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

        <div class="justify-content flex ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('介護サービス') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex">
            <div class="mr-5">
            <button type="button" class="btn mb-8 btn-primary" data-toggle="modal" data-target="#addModal">新規予定を追加する</button>
            </div> 
            <div class="">
            <a href="/calendar" type="button" class="btn mb-8 bg-blue-200">カレンダーをチェックする</a>
            </div> 
            </div>

            <!-- addModalモーダル表示（モーダルのIDを動的に設定） -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><div class="modal-title" id="myModalLabel">新規予定追加</div></h4>
                        </div>
                        <div class="modal-body">
                            <form action="/calendar" method="POST">
                            @csrf
                                <p>日時
                                <div>
                                    <label>開始
                                    <input type="date" name="start_date">
                                    <input type="time" name="start_time" step="1800" list="data-list">
                                    </label>
                                </div>
                                <div>
                                    <label>終了
                                    <input type="date" name="end_date">
                                    <input type="time" name="end_time" step="1800" list="data-list">
                                    </label>
                                </div>

                                <datalist id="data-list">
                                    <option value="08:00"></option>
                                    <option value="08:30"></option>
                                    <option value="09:00"></option>
                                    <option value="09:30"></option>
                                    <option value="10:00"></option>
                                    <option value="10:30"></option>
                                    <option value="11:00"></option>
                                    <option value="11:30"></option>
                                    <option value="12:00"></option>
                                    <option value="12:30"></option>
                                    <option value="13:00"></option>
                                    <option value="13:30"></option>
                                    <option value="14:30"></option>
                                    <option value="15:00"></option>
                                    <option value="15:30"></option>
                                    <option value="16:00"></option>
                                    <option value="17:30"></option>
                                    <option value="18:00"></option>
                                    </datalist>

                                </p>
                                <lavel>予定タイトル
                                <input type="text" name="event_name" list="title-list" required>
                                </input>
                                </lavel>   
                                <datalist id="title-list">
                                    <option value="お風呂"></option>
                                    <option value="診察"></option>
                                    <option value="宅食"></option>
                                    <option value="ケアマネさん訪問"></option>
                                </datalist> 
                                <p></p>
                                <lavel>内容
                                <div class="form-outline">
                                <textarea id="text-area" rows="3" name="event_detail" required>
                                </textarea>
                                </div>
                                </lavel> 
                                <p></p>
                                <div>
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold">
                                    登録する
                                </button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
        </div>

        </div>

            <!-- 利用者用の画面 -->
             <!-- 引数calendarsを関数calendarにひとつずつ出している -->
             

             <table class="table table-striped">
                <thead>
                    <tr>
                        <td>no.</td>
                        <td>予定</td>
                        <td>内容</td>
                        <td>日付</td>
                        <td></td>
                        <!-- <td>利用者名</td> -->
                    </tr>
                </thead>
                @foreach($calendars as $calendar) 
                @can('update', $calendar)
                    <tr>
                        <td>{{$calendar->number}}</td>
                        <td>{{$calendar->event_name}}</td> 
                        <td>{{$calendar->event_detail}}</td>
                        <td>{{$calendar->start_date}}</td>
                        <td>
                        <!-- モーダルを動的に識別するために、IDに$calendar->idを使用 -->
                        <button type="button" class="btn bg-gray-200 mb-8" data-toggle="modal" data-target="#testModal{{$calendar->id}}">詳細</button>
                        </td>
                    </tr>

                     <!-- モーダル表示（モーダルのIDを動的に設定） -->
                    <div class="modal fade" id="testModal{{$calendar->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4><div class="modal-title" id="myModalLabel">詳細</div></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>予定：{{$calendar->event_name}}</p>
                                        <p>内容：{{$calendar->event_detail}}</p>
                                        <p>開始時間：{{$calendar->start_date}},{{$calendar->start_time}}</p>
                                        <p>終了時間：{{$calendar->end_date}},{{$calendar->end_time}}</p>
                                        <p></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gray-200" data-dismiss="modal">閉じる</button>
                                        <form action="/calendar/{{$calendar->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">削除する</button>
                                        </form>
                        

                                    </div>
                                </div>
                            </div>
                    </div>
                @endcan
                @endforeach
            </table>




            {{$calendars->links()}}


                <!-- <div class="p-6 text-gray-900">
                    {{ __("てすと") }}
                </div> -->




            </div>
        </div>
    </div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</x-app-layout>
