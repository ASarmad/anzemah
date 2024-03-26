<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EvidancesController;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

/*
*
* The start route of the website
*/
Auth::routes();
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
/*
*
* the 2 main controllers for each user  to control the whole dashboard
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('/adashboard',[AdminController::class, 'index'] )->name('dashboardAdmin');
    Route::get('/cdashboard',[ClientController::class, 'index'] )->name('dashboardClient');
});
/*
*
*
* The User Routes
* 
*/
Route::group(['prefix' => '/cdashboard', 'middleware' => ['auth']], function () {
    // User Model //
    Route::controller(UserController::class)->group(function () {
        Route::get('/setting', function(){ return view('user.setting'); })->name('setting');
        Route::post('/setting/password', 'passwordUpdate')->name('setting_password_update');
    }); 

    // Evidance Model //    
    Route::controller(EvidancesController::class)->group(function () {
        Route::get('/evidance', 'evidanceRead')->name('evidance_read');
        Route::get('/evidance/{id}', 'singleEvidanceRead')->name('single_evidance_read');
    }); 
    
    // Uploads Model //
    Route::controller(UploadsController::class)->group(function () {     
        Route::post('/evidance/{id}/create', 'uploadCreate')->name('upload_create');
        Route::post('/evidance/{id}/delete/{fileid}', 'uploadDestroy')->name('upload_destroy');
    }); 

    // Comment Model //
    Route::controller(CommentsController::class)->group(function () {
        Route::post('/evidance/{id}/comment/create', 'commentCreate')->name('comment_create');
        Route::post('/evidance/{id}/comment/delete/{commentid}', 'commentDestroy')->name('comment_destroy');
    }); 

    // Contact_Us Model //
    Route::controller(UserController::class)->group(function () { 
        Route::get('/cdashboard/contactus', function(){ return view('user.contactus'); })->name('contactus');
        Route::post('/cdashboard/contactus/create', 'contactUsCreate')->name('contactus_create'); 
    }); 
});
/*
*   
*
* The Admin Routes 
*
*/
Route::group(['prefix' => '/adashboard', 'middleware' => ['auth']], function () {
    // User Model //
    Route::controller(UserController::class)->group(function () {
        // For: Admin
        Route::get('/addAdmin', function(){ return view('admin.addAdmin'); })->name('admin_create_form');
        Route::post('/addAdmin/create','adminCreate')->name('admin_create');
        Route::get('/viewAdmin', 'adminRead')->name('admin_read');
        Route::get('/viewAdmin/{id}', function($id){ 
            $user = User::findOrFail($id);
            return view('admin.updateAdmin', ['user' => $user]);
        })->name('admin_update_form');
        Route::put('/viewAdmin/{id}/Update', 'adminUpdate')->name('admin_update');
        Route::delete('/viewAdmin/{id}/Delete','adminDelete')->name('admin_delete');

        // For : User 
        Route::get('/addUserToClient', function(){ 
            $clients = Client::get();
            return view('admin.addUserToClient', ['clients' => $clients]); 
        })->name('user_client_create_form');
        Route::post('/addUserToClient/create','userClientCreate')->name('user_client_create');
        Route::get('/viewUser', 'userRead')->name('user_read');
        Route::get('/viewUser/{id}', function($id){ 
            $user = User::findOrFail($id);
            return view('admin.updateUser', ['user' => $user]);
        })->name('user_update_form');
        Route::put('/viewUser/{id}/Update', 'userUpdate')->name('user_update');
        Route::delete('/viewUser/{id}/Delete', 'userDelete')->name('user_delete');
    });  

    // Client Model //
    Route::controller(ClientController::class)->group(function () {
        Route::get('/addClient', function(){ return view('admin.addClient'); })->name('client_create_form');
        Route::post('/addClient/create',  'clientCreate')->name('client_create');
        Route::get('/viewClient', 'clientRead')->name('client_read');
        Route::get('/viewClient/client/{id}', 'clientFullRead')->name('client_full_read');
        Route::get('/viewClient/{id}', function($id){ 
            $client = Client::findOrFail($id);
            return view('admin.updateClient', ['client' => $client]);
        })->name('client_update_form');
        Route::put('/viewClient/{id}/{oldLogo}/Update',  'clientUpdate')->name('client_update');
        Route::delete('/viewClient/{id}/delete',  'clientDelete')->name('client_delete');

    });  

    // Certificate Model //
    Route::controller(CertificateController::class)->group(function () {
        Route::get('/addCertificate', function(){ 
            $clients = Client::get();
            return view('admin.addCertificate', ['clients' => $clients]);
        })->name('certificate_create_form');
        Route::post('/addCertificate/create', 'certificateCreate')->name('certificate_create');
        Route::get('/viewCertificate', 'certificateRead')->name('certificate_read');
        Route::get('/viewCertificate/{id}', function($id){ 
            $certificate = Certificate::findOrFail($id);
            return view('admin.updateCertificate', ['certificate' => $certificate]);
        })->name('certificate_update_form');
        Route::put('/viewCertificate/{id}/Update', 'certificateUpdate')->name('certificate_update');
        Route::delete('/viewCertificate/{id}/delete', 'certificateDelete')->name('certificate_delete');
        //NOTE: THIS ROUTE IS WORKING IN THE EVIDANCE ROUTES //
        Route::get('/viewCertificate/certificate/{id}', 'certificateFullRead')->name('certificate_full_read');
    }); 

    // Evidance Model //
    Route::controller(EvidancesController::class)->group(function () {
        // TODO: FIX NAMING
        Route::get('/viewCertificate/certificate/{id}/q{file}', 'viewClientUploads')->name('viewClientUploads');
        Route::get('/viewCertificate/certificate/{id}/q{file}/update', 'ChangeUploadStatus')->name('changestatus');
        // TODO END
    }); 

    // Version Relase & Upcoming//
    Route::get('/relase', function(){ return view('admin.layouts.relase'); })->name('relase');
    Route::get('/upcoming', function(){ return view('admin.layouts.upcoming'); })->name('upcoming');
});





