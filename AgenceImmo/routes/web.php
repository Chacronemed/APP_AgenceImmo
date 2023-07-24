<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$idRegex='[0-9]+';
$slugID='[0-9a-z\-]+';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/biens', [\App\Http\Controllers\HomePropertyController::class, 'index'])->name('Property.index');

Route::post('/bien/{property}/contact', [\App\Http\Controllers\Admin\PropertyController::class, 'contact'])
    ->name('property.contact')
    ->where('property', $idRegex);


Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\HomePropertyController::class, 'show'])->name('Property.show')->where([
    'property'=>$idRegex,
    'slug'=>$slugID,
]);


Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'dologin']);
Route::delete('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
    Route::resource('property',\App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option',\App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
