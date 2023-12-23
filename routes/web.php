<?php

use Illuminate\Support\Facades\Route;
use App\Models\Evidance;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\User;

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

Auth::routes();

// The start route of the website //
Route::get('/', function () {
    if (Auth::check()) {
        if(auth()->user()->role==='user'){
            return redirect("/cdashboard");
        }else{
            return redirect("/adashboard");
        }
    } else {
        return view('auth.login');
    }
});

// the 2 main controllers for each user  to control the whole dashboard //
Route::get('/adashboard',[App\Http\Controllers\AdminController::class, 'index'] )->name('dashboardAdmin')->middleware('auth');
Route::get('/cdashboard',[App\Http\Controllers\ClientController::class, 'index'] )->name('dashboardClient')->middleware('auth');
/*
*
*
* The User Routes
* 
*/
// Evidance Model //
Route::get('/cdashboard/evidance', [App\Http\Controllers\EvidancesController::class, 'evidanceRead'])->name('evidance_read')->middleware('auth');
Route::get('/cdashboard/evidance/{id}', [App\Http\Controllers\EvidancesController::class, 'singleEvidanceRead'])->name('single_evidance_read')->middleware('auth');

// Upload Model //
Route::post('/cdashboard/evidance/{id}/create', [App\Http\Controllers\UploadsController::class, 'uploadCreate'])->name('upload_create')->middleware('auth');
Route::post('/cdashboard/evidance/{id}/delete/{fileid}', [App\Http\Controllers\UploadsController::class, 'uploadDestroy'])->name('upload_destroy')->middleware('auth');

// Comment Model //
Route::post('/cdashboard/evidance/{id}/comment/create', [App\Http\Controllers\CommentsController::class, 'commentCreate'])->name('comment_create')->middleware('auth');
Route::post('/cdashboard/evidance/{id}/comment/delete/{commentid}', [App\Http\Controllers\CommentsController::class, 'commentDestroy'])->name('comment_destroy')->middleware('auth');

// User Model //
Route::get('/cdashboard/setting', function(){ return view('user.setting'); })->name('setting')->middleware('auth');
Route::post('/cdashboard/setting/password', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('setting_password_update')->middleware('auth');

// Contact_Us Model //
Route::get('/cdashboard/contactus', function(){ return view('user.contactus'); })->name('contactus')->middleware('auth');
Route::post('/cdashboard/contactus/create', [App\Http\Controllers\ContactUsController::class, 'contactUsCreate'])->name('contactus_create')->middleware('auth');
/*
*   
*
* The Admin Routes 
*
*/
// User Model //
Route::get('/adashboard/addAdmin', function(){ return view('admin.addAdmin'); })->name('admin_create_form')->middleware('auth');
Route::post('/adashboard/addAdmin/create', [App\Http\Controllers\UserController::class, 'adminCreate'])->name('admin_create')->middleware('auth');
Route::get('/adashboard/viewAdmin', [App\Http\Controllers\UserController::class, 'adminRead'])->name('admin_read')->middleware('auth');
Route::get('/adashboard/viewAdmin/{id}', function($id){ 
    $user = User::whereid($id)->first();
    return view('admin.editAdmin', ['user' => $user]);
 })->name('admin_edit_form')->middleware('auth');
 Route::get('/adashboard/viewAdmin/{id}/Edit', [App\Http\Controllers\UserController::class, ''])->name('admin_edit')->middleware('auth');


// Client Model //
Route::get('/adashboard/addClient', function(){ return view('admin.addClient'); })->name('client_create_form')->middleware('auth');
Route::post('/adashboard/addClient/create', [App\Http\Controllers\AdminController::class, 'clientCreate'])->name('client_create')->middleware('auth');
Route::get('/adashboard/viewClient', [App\Http\Controllers\AdminController::class, 'clientRead'])->name('client_read')->middleware('auth');

Route::get('/adashboard/viewClient/{id}', [App\Http\Controllers\AdminController::class, 'viewFullClient'])->name('viewFullClient')->middleware('auth');
Route::get('/adashboard/viewClient/delete', [App\Http\Controllers\AdminController::class, ''])->name('deleteClient')->middleware('auth');

// Certificate Model //
Route::get('/adashboard/addCertificate', function(){ 
    $clients = Client::get();
    return view('admin.addCertificate', ['clients' => $clients]);
 })->name('certificate_create_form')->middleware('auth');
Route::post('/adashboard/addCertificate/create', [App\Http\Controllers\AdminController::class, ''])->name('certificate_create')->middleware('auth');
Route::get('/adashboard/viewCertificate', [App\Http\Controllers\AdminController::class, 'certificateRead'])->name('certificate_read')->middleware('auth');

// Evidance Model //
Route::get('/adashboard/viewClient/{id}/{file}', [App\Http\Controllers\AdminController::class, 'viewClientUploads'])->name('viewClientUploads')->middleware('auth');
Route::get('/adashboard/viewClient/{id}/{file}/update', [App\Http\Controllers\AdminController::class, 'ChangeUploadStatus'])->name('changestatus')->middleware('auth');

// Version Relase & Upcoming//
Route::get('/adashboard/relase', function(){ return view('admin.layouts.relase'); })->name('relase')->middleware('auth');
Route::get('/adashboard/upcoming', function(){ return view('admin.layouts.upcoming'); })->name('upcoming')->middleware('auth');


