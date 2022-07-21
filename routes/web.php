<?php

use Illuminate\Support\Facades\Route;


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
//Trang chủ hiện ra danh sách bài báo
Route::get('/',[\App\Http\Controllers\ShowPostController::class,'index'])->name('get.index');

//Trang chủ hiện ra danh sách bài báo
Route::get('/index',[\App\Http\Controllers\ShowPostController::class,'index'])->name('get.index');

//Trang hiện ra chi tiết 1 bài báo
Route::get('/detail/{id}',[\App\Http\Controllers\ShowPostController::class,'detail'])->name('get.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Những tài khoản có quyền admin mới có thể đi vào
Route::middleware(['role:Admin'])->prefix('admin')->group(function (){

    //Lấy các bài báo của trang VNExpress
    Route::get('/hack',[\App\Http\Controllers\VNController::class,'index'])->name('get.hacker');

    //Route resource của tài khoản
    Route::resource('/user',App\Http\Controllers\UserController::class);

    Route::resource('/permissions',App\Http\Controllers\PermissionsController::class);

    //Route resource của Role
    Route::resource('/roles',App\Http\Controllers\RoleController::class);

    //Trang hiển thị danh sách bài báo đã lấy về
    Route::get('/posts', [\App\Http\Controllers\PostController::class,'create'])
        ->name('get.indexPost');

    //Chỉnh sửa status
    Route::post('/selected', [\App\Http\Controllers\PostController::class,'updateSelectStatus'])
        ->name('get.updateSelectStatus');

    //Xóa bài báo đã lấy về
    Route::get('/delete/{id}',[\App\Http\Controllers\PostController::class,'delete'])
        ->name('get.delete');
});
