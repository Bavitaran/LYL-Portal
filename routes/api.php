<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserdetailController;
use App\Http\Controllers\MatteroverviewController;
use App\Http\Controllers\FileUploadController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [RegisterController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function() {
      Route::get('logout', [RegisterController::class, 'logout']);
      Route::get('user', [RegisterController::class, 'user']);
      Route::get('userList', [RegisterController::class, 'userList']);
      Route::post('changePassword', [RegisterController::class, 'changePassword']);

      // User Detail
      // Route::post('createUserList', [UserdetailController::class, 'createUserList']);
      Route::get('userlist', [UserdetailController::class, 'userlist']);
      Route::post('createUserList', [UserdetailController::class, 'createUserList']);
      Route::get('userDetailEdit', [UserdetailController::class, 'userDetailEdit']);
      Route::post('updateUserDetail', [UserdetailController::class, 'updateUserDetail']);

      // Matter management
      Route::get('matterlist', [MatteroverviewController::class, 'matterlist']);
      Route::get('createMatter', [MatteroverviewController::class, 'createMatter']);

      // File Uploads
      Route::get('upload_file', function(){ 
        return view('upload'); }); 
      });
      Route::post('store_file', [FileUploadController::class, 'fileStore']);
    
  });