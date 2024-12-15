<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                <form action="/inquiry/{{$test->id}}" method="POST" class="card card-body shadow-2 mb-1">
                    <!-- @csrfはトークンが入る -->
                    @csrf
                    @method('PUT')
                    <div class="form-outline mb-2">
                        <textarea class="form-control" id="text-area" rows="4" name="message">{{ $test->message }}</textarea>
                        <label class="form-label" for="text-area">メッセージを入力</label>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="/inquiry" class="btn btn-dark btn-block shadow-0">キャンセル</a>
                        <button type="submit" class="btn btn-primary btn-block shadow-0 mt-0">更新</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="container mt-4">
</x-app-layout>