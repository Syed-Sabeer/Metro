<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CustomerCaseController;
use App\Http\Controllers\NotificationController;


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
// Route::get('/view-email', [UserController::class, 'viewemail'])->name('view.email');
Route::get('/view-email', function () {
    return view('emailsa');
})->name('view.email');
// update status
Route::post('/update-status', [UserController::class, 'updateStatus'])->name('update.status');



// Cases All Route
Route::get('/cases', [CaseController::class, 'Cases'])->name('add.cases');
Route::get('/search-members', [CaseController::class, 'SearchMember'])->name('members.search');
Route::get('/search-employees', [CaseController::class, 'SearchEmployee'])->name('employees.search');

Route::post('/case/store', [CaseController::class, 'storecase'])->name('case.store');
Route::get('/caseview/{id}', [CaseController::class, 'viewCase'])->name('case.view');
Route::get('/get-case-details/{id}', [CaseController::class, 'getCaseDetails'])->name('get-case-details');
Route::post('/update-case-details/{id}', [CaseController::class, 'updateCaseDetails'])->name('update.case.sub.des');
Route::get('/case/delete{id}', [CaseController::class, 'Delete'])->name('case.delete');

Route::post('/cases/upload-file/{id}', [CaseController::class, 'casefileupload'])->name('case.file.upload');
// Route for moving backward the status
// Route::post('/case/{id}/back-status', [CaseController::class, 'backStatus'])->name('case.back');
Route::post('/case/{id}/back-status', [CaseController::class, 'backStatus'])->name('case.back');
// Route for moving forward the status
Route::post('/case/{id}/forward-status', [CaseController::class, 'forwardStatus'])->name('case.forward');


Route::get('/search/email-identifier', [CaseController::class, 'searchEmailIdentifier'])->name('search.email-identifier');



// Email CRUD Routes
Route::prefix('emails')->group(function () {
    Route::get('/', [EmailController::class, 'index'])->name('emails.index'); // List all emails
    Route::get('/create', [EmailController::class, 'create'])->name('emails.create'); // Show form to create email
    Route::post('/store', [EmailController::class, 'store'])->name('store.email'); // Store email
    Route::get('/{email}/edit', [EmailController::class, 'edit'])->name('emails.edit'); // Show form to edit email
    Route::put('/{email}', [EmailController::class, 'update'])->name('emails.update'); // Update email
    Route::get('/{email}', [EmailController::class, 'destroy'])->name('emails.destroy'); // Delete email
});

// Logout
Route::get('/supperadmin/logout', [UserController::class, 'logout'])->name('supperadmin.logout');

// Route::get('/caseview', function () {
//     return view('caseview');
// })->name('case.view');

Route::get('/userindex', [CustomerCaseController::class, 'index'])->name('userss');

Route::get('/usercaseview', function () {
    return view('usercaseview');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index/notification', [NotificationController::class, 'Notification'])->name('index.notification');
Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::get('/notifications/delete/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');
