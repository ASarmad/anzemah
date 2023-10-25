<?php

use Illuminate\Support\Facades\Route;
use App\Models\Evidance;
use Illuminate\Support\Facades\DB;

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

Auth::routes();

// the 2 main controllers for each user  to control the whole dashboard //
Route::get('/adashboard',[App\Http\Controllers\AdminController::class, 'index'] )->name('dashboardAdmin')->middleware('auth');
Route::get('/cdashboard',[App\Http\Controllers\ClientController::class, 'index'] )->name('dashboardClient')->middleware('auth');

// The User Routes //
Route::get('/evidance', [App\Http\Controllers\ClientController::class, 'readEvidance'])->name('evidance')->middleware('auth');

Route::get('/upload/{id}', function($id){
    //$evidances = DB::table('evidances')->whereid($id)->first();
    $evidances = Evidance::whereid($id)->first();
    return view('user.upload', ['evidances' => $evidances]);
})->name('upload')->middleware('auth');

Route::post('/upload/{id}/store', [App\Http\Controllers\ClientController::class, 'store'])->name('upload_store')->middleware('auth');

Route::post('/upload/{id}/store/comment', [App\Http\Controllers\ClientController::class, 'storeComment'])->name('comment_store')->middleware('auth');

//Route::delete('/upload/{id}/delete/{fileid}', [App\Http\Controllers\EvidanceController::class, 'destroy'])->name('delete_file')->middleware('auth');
//Route::get('/upload/{id}/delete/{fileid}', ['as'=>'fileid','uses'=>'EvidanceController@destroy'])->name('deleteFile')->middleware('auth');

Route::post('/upload/{id}/delete/{fileid}', [App\Http\Controllers\ClientController::class, 'destroyFile'])->name('deleteFile')->middleware('auth');

Route::post('/upload/{id}/deletecomment/{commentid}', [App\Http\Controllers\ClientController::class, 'destroyComment'])->name('deleteComment')->middleware('auth');

Route::get('/contactus', function(){
    return view('user.contactus');
})->name('contactus')->middleware('auth');

Route::post('/contactus/send', [App\Http\Controllers\ContactUsController::class, 'store'])->name('contactuscontroller')->middleware('auth');

// The Admin Routes //
Route::get('/addClient', [App\Http\Controllers\AdminController::class, 'addClient'])->name('addClient')->middleware('auth');
Route::get('/viewClient', [App\Http\Controllers\AdminController::class, 'viewClient'])->name('viewClient')->middleware('auth');
Route::get('/viewClient/{id}', [App\Http\Controllers\AdminController::class, 'viewFullClient'])->name('viewFullClient')->middleware('auth');
