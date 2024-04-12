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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

Route::get('dashboard', [CrudUserController::class, 'dashboard']);
Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');
>>>>>>> 4-register
=======
=======
//Nguen Huu Kien
Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

>>>>>>> 3-listOfUser
=======
//Tran Huu Kien
Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

>>>>>>> 6-view_delete
//Login(Tran Huu Nam)
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

//create(Pham Thanh Liem)
Route::get('dashboard', [CrudUserController::class, 'dashboard']);
Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 3-login/logout
=======
>>>>>>> 3-listOfUser
=======
//Pham Thi Bich Buoc
Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');
Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');
>>>>>>> 6-view_delete
