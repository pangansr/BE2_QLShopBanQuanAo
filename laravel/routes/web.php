<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

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
    return view('crud_user.create');
});
//Tran Huu Kien
Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

//Login(Tran Huu Nam)
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

//create(Pham Thanh Liem)
Route::get('dashboard', [CrudUserController::class, 'dashboard']);
Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

//Pham Thi Bich Buoc
Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');
Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

//Pham Thi Thanh Tam
Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');