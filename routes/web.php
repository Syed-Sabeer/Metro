<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserHomeController;

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');

Route::get('/', function () {
    return redirect('/login/admin');
});

// Admin Login Route
Route::get('/login/admin', [UserController::class, 'SignIn'])->name('signin');
Route::post('/login/admin/store', [UserController::class, 'LoginAdmin'])->name('login.admin');

// Admin Status Route

Route::get('/view-status', [StatusController::class, 'ViewStatus'])->name('view.status');
Route::get('/add-status', [StatusController::class, 'AddStatus'])->name('add.status');
Route::post('/store-status', [StatusController::class, 'StoreStatus'])->name('store.status');
Route::get('/status/edit/{id}', [StatusController::class, 'EditStatus'])->name('status.edit');
Route::post('/status/update/{id}', [StatusController::class, 'UpdateStatus'])->name('status.update');
Route::get('/status/delete/{id}', [StatusController::class, 'DeleteStatus'])->name('status.delete');

// User Login Route
Route::get('/login/user', [UserController::class, 'LoginUser'])->name('login.user');
Route::post('/login/user/store', [UserController::class, 'LoginUserStore'])->name('login.user.store');

// User change password
Route::get('set/password/{id}', [UserController::class, 'SetPassword'])->name('set.password');
Route::post('update_password/{id}', [UserController::class, 'UpdatePassword'])->name('password.user.update');

// Admin All Route

Route::get('/add-admin', [UserController::class, 'AddAdmin'])->name('add.admin');
Route::post('/storeadmin', [UserController::class, 'StoreAdmin'])->name('store.admin');
Route::get('/view-admin', [UserController::class, 'ViewAdmin'])->name('view.admin');


// Customer and user All Route
Route::get('/add-user', [UserController::class, 'AddUser'])->name('add.user');
Route::get('/view-customer', [UserController::class, 'ViewCustomer'])->name('view.customer');
Route::post('/storeuser', [UserController::class, 'StoreUser'])->name('store.user');
Route::get('/user/edit/{id}', [UserController::class, 'EditUser'])->name('edit.user');
Route::post('/updateuser/{id}', [UserController::class, 'UpdateUser'])->name('update.user');
Route::get('/user/delete/{id}', [UserController::class, 'DeleteUser'])->name('user.delete');


// Employee All Route

Route::get('/add-employee', [UserController::class, 'AddEmployee'])->name('add.employee');
Route::post('/storeemployee', [UserController::class, 'StoreEmployee'])->name('store.employee');
Route::get('/view-employee', [UserController::class, 'viewEmployee'])->name('view.employee');

// update status
Route::post('/update-status', [UserController::class, 'updateStatus'])->name('update.status');



// Cases All Route
Route::get('/cases', [CaseController::class, 'Cases'])->name('add.cases');
Route::get('/search-members', [CaseController::class, 'SearchMember'])->name('members.search');
Route::post('/case/store', [CaseController::class, 'storecase'])->name('case.store');
Route::get('/caseview/{id}', [CaseController::class, 'viewCase'])->name('case.view');

Route::post('/cases/upload-file/{id}', [CaseController::class, 'casefileupload'])->name('case.file.upload');
// Route for moving backward the status
Route::post('/case/{id}/back-status', [CaseController::class, 'backStatus'])->name('case.back');
// Route for moving forward the status
Route::post('/case/{id}/forward-status', [CaseController::class, 'forwardStatus'])->name('case.forward');


// Route::get('/caseview', function () {
//     return view('caseview');
// })->name('case.view');

Route::get('/userindex', function () {
    return view('userindex');
});
Route::get('/usercaseview', function () {
    return view('usercaseview');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
