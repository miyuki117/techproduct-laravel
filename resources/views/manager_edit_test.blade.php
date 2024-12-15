<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">

            <div class="card card-body shadow-2 mb-2">
                <div class="d-flex justify-content-between">
                    <p>
                        <span class="font-weight-bold mr-2 text-cyan-500">{{ $test->user->name }}</span>
                        <span class="text-cyan-500" style="font-size: 0.8rem;">{{ $test->created_at }}</span>
                    </p>
                    <div class="form-outline mb-2">
                        <div class="text-cyan-500 font-bold" id="text-area" rows="4" name="message">{{ $test->message }}</div>
                    </div>

                </div>
            </div>


            <form action="/inquiry/{{$test->id}}/manager_update" method="POST" class="card card-body shadow-2 mb-1">
                <!-- @csrfはトークンが入る -->
                @csrf
                @method('PUT')
                <div class="form-outline mb-2">
                    <textarea class="form-control " id="text-area" rows="4" name="manager_message">{{ $test->manager_message }}</textarea>
                    <div></div>
                    <label class="form-label" for="text-area"></label>
                </div>
                <div class="d-flex gap-3">
                    <a href="/inquiry_manager" class="btn btn-dark btn-block shadow-0">キャンセル</a>
                    <button type="submit" class="btn btn-primary btn-block shadow-0 mt-0">更新</button>
                </div>
            </form>
            </div>
        </div>
    <div class="container mt-4">
</x-app-layout>