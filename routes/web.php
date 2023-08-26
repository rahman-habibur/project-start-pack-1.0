<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');
 
//Admin Routes
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');

    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit', 'edit_profile')->name('edit.profile');
    Route::post('/admin/store', 'store_profile')->name('store.profile');

    Route::get('/admin/changepass', 'changepass_view')->name('admin.password');
    Route::post('/admin/changepass', 'admin_changes_update')->name('admin.changes.update');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
