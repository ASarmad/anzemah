<?php

use Illuminate\Support\Facades\Route;
use App\Models\Evidance;

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
Route::get('/cdashboard/evidance/{id}', function($id){
    $evidances = Evidance::whereid($id)->first();
    return view('user.upload', ['evidances' => $evidances]);
})->name('single_evidance_read')->middleware('auth');

// Upload Model //
Route::post('/cdashboard/evidance/{id}/create', [App\Http\Controllers\UploadsController::class, 'uploadCreate'])->name('upload_create')->middleware('auth');
Route::post('/cdashboard/evidance/{id}/delete/{fileid}', [App\Http\Controllers\UploadsController::class, 'uploadDestroy'])->name('upload_destroy')->middleware('auth');

// Comment Model //
Route::post('/cdashboard/evidance/{id}/comment/create', [App\Http\Controllers\CommentsController::class, 'commentCreate'])->name('comment_create')->middleware('auth');
Route::post('/cdashboard/evidance/{id}/comment/delete/{commentid}', [App\Http\Controllers\CommentsController::class, 'commentDestroy'])->name('comment_destroy')->middleware('auth');

// User Model //
Route::get('/cdashboard/setting', function(){
    return view('user.setting');
})->name('setting')->middleware('auth');
Route::post('/cdashboard/setting/password', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('setting_password_update')->middleware('auth');

// Contact_Us Model //
Route::get('/cdashboard/contactus', function(){
    return view('user.contactus');
})->name('contactus')->middleware('auth');
Route::post('/cdashboard/contactus/create', [App\Http\Controllers\ContactUsController::class, 'contactUsCreate'])->name('contactus_create')->middleware('auth');

/*
*   
*
* The Admin Routes 
*
*/

Route::get('/adashboard/addClient', [App\Http\Controllers\AdminController::class, 'addClient'])->name('addClient')->middleware('auth');
Route::get('/adashboard/viewClient', [App\Http\Controllers\AdminController::class, 'viewClient'])->name('viewClient')->middleware('auth');
Route::get('/adashboard/viewClient/{id}', [App\Http\Controllers\AdminController::class, 'viewFullClient'])->name('viewFullClient')->middleware('auth');
/*
*   WORKING ON
*/
Route::get('/adashboard/viewClient/{id}/{file}', [App\Http\Controllers\AdminController::class, 'viewClientUploads'])->name('viewClientUploads')->middleware('auth');
Route::get('/adashboard/viewClient/{id}/{file}/update', [App\Http\Controllers\AdminController::class, 'ChangeUploadStatus'])->name('changestatus')->middleware('auth');

