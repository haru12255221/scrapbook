<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapController;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


// Route::get('/scraps/create', [ScrapController::class, 'create'])->name('scraps.create');
Route::post('/scraps', [ScrapController::class, 'store'])->name('scraps.store');
Route::get('/scraps', [ScrapController::class, 'index'])->name('scraps.index');
Route::get('/scraps/{scrap}/edit', [ScrapController::class, 'edit'])->name('scraps.edit');
Route::put('/scraps/{scrap}', [ScrapController::class, 'update'])->name('scraps.update');
Route::delete('/scraps/{scrap}', [ScrapController::class, 'destroy'])->name('scraps.destroy');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/scraps');
})->name('logout');

Route::get('/login', function () {
    return view('auth.login'); // ログインフォームのビューを表示
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/scraps');
    } else {
        return redirect('/login')->with('error', 'メールアドレスまたはパスワードが違います。');
    }
});

Route::middleware([IsAdmin::class])->group(function () {
    // ここに管理者だけがアクセスできるルートを作る
    Route::get('/scraps/create', [ScrapController::class, 'create'])->name('scraps.create');
});

Route::get('register', function () {
    return view('auth.register'); // 登録フォームのビューを表示
})->name('register');

Route::post('register', function (Request $request) {
    $validate= $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/login')->with('success', 'ユーザー登録が完了しました。ログインしてください。');
})->name('register.post');