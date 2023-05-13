<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EXCController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', function() {
    return redirect()->route('home');
});
Route::get('blogs/{title}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('exc/{input_type}', [EXCController::class, 'input'])->name('exc.input');
Route::post('exc/process/{input_type}', [EXCController::class, 'process'])->name('exc.process');

Route::post('ocr/upload', [EXCController::class, 'ocr_upload'])->name('ocr.upload');
Route::post('ocr/api', [EXCController::class, 'ocr_api'])->name('ocr.api');

// Auth::routes();
// Route::get('logout', function ()
// {
//     auth()->logout();
//     Session()->flush();

//     return Redirect::to('/');
// })->name('logout');


// React below

Route::get('/react', function () {
    return view('react.welcome');
});

Route::get('api_get_items/{m}/{l}/{d}/{s}/{last}', [ItemController::class, 'api_get_items'])->name('item.list');
