<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;

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

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::group(['prefix' => ''], static function() {
   Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
   Route::get('/news/{id}/show', [NewsController::class, 'show'])
   ->where('id', '\d+')
       ->name('news.show');
});


Route::get('collection', function() {
    $names = ['names' => ['Ann', 'Billy', 'Sam', 'Jhon', 'Andy', 'Feeby', 'Edd', 'Jil', 'Jeck', 'Freddy']];
    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $collect = \collect($names);

    dd($collection->where('price', 100)->toJson());

    dd($collect->toJson());


});

