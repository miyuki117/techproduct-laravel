<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                <form action="/mailsend" method="POST" class="card card-body shadow-2 mb-1">
                    <!-- @csrfはトークンが入る -->
                    @csrf
                    <div class="form-outline mb-2">
                    <!-- テスト -->
                        <div class="form-outline">
                        <textarea class="form-control" id="text-area" rows="3" name="email" placeholder="test@example.com" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold">送信</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="container mt-4">
</x-app-layout>