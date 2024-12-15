<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToiawaseController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\OrderShipmentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ModalController;

use App\Livewire\Modal;


// order-shippedへ遷移させる
// *****************
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
// *****************

use App\Providers\ViewServiceProvider;
use App\Notifications\InformationNotification;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/calendar', function () {
//     return view('calendar');
// })->middleware(['auth', 'verified'])->name('calendar');

Route::middleware('auth')->group(function () {
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::post('/calendar_show', [CalendarController::class, 'show'])->name('calendar.show'); //calendar取得用
Route::delete('/calendar/{calendar}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

});


Route::get('/healthcare', function () {
    return view('healthcare');
})->middleware(['auth', 'verified'])->name('healthcare');




// Route::get('/service', function () {
//     return view('service');
// })->middleware(['auth', 'verified'])->name('service');

Route::middleware('auth')->group(function () {
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
});

Route::get('/modal', [ModalController::class,'modal']) ;
    



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// //メール通知用で追記
// Route::middleware('auth')->group(function () {
//     Route::get('/mailsend', [MailSendController::class, 'index'])->name('test.index');
//     Route::post('/mailsend', [MailSendController::class, 'ship'])->name('test.index'); 
// });

// Route::get('/order-shipped',function() {

//     $order = Order::find(1);
//     Mail::to('customer@example.com')->send(new OrderShipped($order));

// });

Route::get('/order-shipped/{order}', function (Order $order) {
    // Orderモデルのインスタンスを渡してメールを送信
    return new OrderShipped($order);
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/toiawase', [ToiawaseController::class, 'index'])->name('toiawases.index');

// Route::get('/toiawase', function () {
//     return view('toiawase');
// });

Route::group(['middleware' => ['auth']], function () { //ログイン画面を挟む
    Route::get('/toiawases', [ToiawaseController::class, 'index'])->name('toiawases.index');
    Route::post('/toiawases', [ToiawaseController::class, 'store'])->name('toiawases.store'); //取得_contorollerのstoreメソッド
    Route::get('/toiawases/{toiawase}/edit', [ToiawaseController::class, 'edit'])->name('toiawases.edit');
    Route::put('/toiawases/{toiawase}', [ToiawaseController::class, 'update'])->name('toiawases.update');
    Route::delete('/toiawases/{toiawase}', [ToiawaseController::class, 'destroy'])->name('toiawases.destroy');
});


Route::group(['middleware' => ['auth']], function () { //ログイン画面を挟む
    Route::get('/inquiry', [TestController::class, 'index'])->name('test.index'); //問い合わせ（投稿画面）
    Route::get('/inquiry_post', [TestController::class, 'index2'])->name('test.index2'); //問い合わせ（一覧）
    Route::get('/inquiry_manager', [TestController::class, 'index_mng'])->name('test.index_mng'); //問い合わせ（ケアマネ用全部表示一覧）
    Route::get('/inquiry/{test}/manager_edit', [TestController::class, 'manager_edit'])->name('test.manager_edit');
    Route::put('/inquiry/{test}/manager_update', [TestController::class, 'manager_update'])->name('test.manager_update');

    Route::post('/inquiry', [TestController::class, 'store'])->name('test.store'); //取得_contorollerのstoreメソッド
    // Route::post('/test', [TestController::class, 'notify'])->name('test.notify'); //★このリンクの送り方でいいのか？
    Route::get('/inquiry/{test}/edit', [TestController::class, 'edit'])->name('test.edit');
    Route::put('/inquiry/{test}', [TestController::class, 'update'])->name('test.update');
    Route::delete('/inquiry/{test}', [TestController::class, 'destroy'])->name('test.destroy');

    Route::post('/inquiry_service', [TestController::class, 'store_service'])->name('test.store_service'); //取得_contorollerのstoreメソッド

});




// お試しアクセス（失敗）
Route::get('/notification', function () {
    return view('notification');
})->middleware(['auth', 'verified'])->name('test');





require __DIR__.'/auth.php';
