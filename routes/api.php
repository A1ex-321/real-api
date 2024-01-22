<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductDetailsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MailController;
use App\Http\Controllers\API\FranchiseController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\ScoController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResources(['products' => ProductDetailsController::class]);
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::get('/auth/login', [AuthController::class, 'loginUser']);
Route::apiResources(['products' => ProductDetailsController::class]);
Route::get('/records', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'categorys']);
Route::post('/mail', [MailController::class, 'sendUserContact']);
Route::post('/franchise', [FranchiseController::class, 'sendfranchiseContact']);



Route::post('/mail', [BlogController::class, 'sendUserContact']);
Route::get('/api/blogs', [BlogController::class, 'index']);
Route::get('/api/blogs/{id}', [BlogController::class, 'blogbyid']);
Route::get('/api/logo', [BlogController::class, 'get_logo']);
Route::get('/content_blogs/{id}', [BlogController::class, 'content_blog']);
Route::get('/demo', [BlogController::class, 'demo']);
Route::get('/blogsimage/{id}', [BlogController::class, 'blogimage']);

// sco
Route::get('/home', [ScoController::class, 'home']);
Route::get('/link', [ScoController::class, 'link']);
//seo blog
Route::get('/seoblogs', [BlogController::class, 'scoblogs']);
Route::get('/blogsco/{id}', [BlogController::class, 'blogsco']);









