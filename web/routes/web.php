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

Route::get('/', [HomeController::class, 'index'])->name('direction');
Route::get('home', [HomeController::class, 'home'])->name('home');

Route::get('blogs/{title}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('exc/list/grade-{grade}/subject-{subject_s}', [EXCController::class, 'list'])->name('exc.list');
Route::get('exc/show/{exc_i}', [EXCController::class, 'show'])->name('exc.show');

Route::get('exc/{input_type}/{grade}/{subject_i}', [EXCController::class, 'input'])->name('exc.input');

Route::post('exc/ocr_nc_upload', [EXCController::class, 'ocr_nc_upload'])->name('exc.ocr_nc_upload');
Route::post('exc/ocr_api_upload', [EXCController::class, 'ocr_api_upload'])->name('exc.ocr_api.upload');
Route::post('exc/ocr_api', [EXCController::class, 'ocr_api'])->name('exc.ocr_api');

Route::post('exc/process/{input_type}', [EXCController::class, 'process'])->name('exc.process');
// Route::get('exc/process/{input_type}', [EXCController::class, 'process'])->name('exc.process');
// Route::get('exc/{input_type}', function() {
//     return view('exercises.test2');
// });


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
