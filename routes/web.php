<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 1) Route có tham số động + ràng buộc số
Route::get('/articles/page/{page}', function ($page) {
    return "Trang bài viết số: " . (int) $page;
})->whereNumber('page')->name('articles.page');

// 2) Tham số tùy chọn + regex slug
Route::get('/articles/slug/{slug?}', function ($slug = 'khong-co-slug') {
    return "Slug: " . $slug;
})->where('slug', '[a-z0-9-]+');

// 3) Route group với prefix 'admin'
Route::prefix('admin')->group(function () {
    Route::get('/articles', fn() => 'Quản trị bài viết')->name('admin.articles.index');
});
use App\Http\Controllers\ArticleController;
Route::resource('articles', ArticleController::class);


Route::get('/articles/show/{article}', function (Article $article) {
    // Tạm thời mock dữ liệu (nếu chưa nối DB)
    // Laravel sẽ cố binding theo id; nếu chưa có DB, bạn có thể tự gán:
    $article->id = $article->id ?? 1;
    $article->title = 'Bài viết demo #' . $article->id;
    return "Binding ok: {$article->title}";
});

