<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserdetailController;
use App\Http\Controllers\MatteroverviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RelevantController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    //Finance


    //Upload documents
    //Route::post("documents", "App\Http\Controllers\CategoryController@documents");


    Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [RegisterController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    // Route::post('invoice', [InvoiceController::class, 'store']);
    // Route::get('getInvoice', [InvoiceController::class, 'show']);

    Route::resource('invoice',App\Http\Controllers\InvoiceController::class)->only(['index','store','show','update','destroy']);
    Route::resource('matter',App\Http\Controllers\MatterController::class)->only(['index','store','show','update','destroy','getRecords','export']);
    Route::resource('users',App\Http\Controllers\RegisterController::class)->only(['index','store','show','update','destroy']);
    Route::resource('mail',App\Http\Controllers\MailController::class)->only(['index','store','show','update','destroy']);
    Route::resource('relevant',App\Http\Controllers\RelevantController::class)->only(['index','store','show','update','destroy']);
    Route::post('/documents', [App\Http\Controllers\FileController::class, 'upload']);
    Route::get('/documents', [App\Http\Controllers\FileController::class, 'index']);
    Route::delete('/documents/{id}', [App\Http\Controllers\FileController::class, 'destroy']);
    //Route::resource('documents',App\Http\Controllers\FileController::class)->only(['index','upload','store','show','update','destroy']);
    //Route::post('upload', [FileController::class, 'upload'])->name('upload');
    Route::get('userlist', [UserdetailController::class, 'userlist']);


    Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', [RegisterController::class, 'logout']);
    Route::get('user', [RegisterController::class, 'user']);
    Route::post('changePassword', [RegisterController::class, 'changePassword']);

    // User Detail
    // Route::post('addParty', [UserdetailController::class, 'addParty']);

    // Route::post('createUserList', [UserdetailController::class, 'createUserList']);
    // Route::get('userDetailEdit', [UserdetailController::class, 'userDetailEdit']);
    // Route::post('updateUserDetail', [UserdetailController::class, 'updateUserDetail']);

    // Matter management
    //Route::get('matterlist', MatteroverviewController::class, 'matterlist');
    });
});
