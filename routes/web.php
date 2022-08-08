<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\BodyIndexController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassRegisterController;
use App\Http\Controllers\ecommerce\CartController;
use App\Http\Controllers\ecommerce\HomeShopController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PackRegisterController;
use App\Http\Controllers\promotionController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/resetpass', [indexController::class, 'resetpass']);
Route::post('/forgot', [indexController::class, 'forgot']);
Route::post('/change', [indexController::class, 'changePass']);
Route::get('/logout', [indexController::class, 'logout']);
Route::post('/login', [indexController::class, 'login']);
Route::get('/', [indexController::class, 'index']);
Route::get('/admin', [adminController::class, 'index']);
Route::get('user/get/{id}', [userController::class, 'getInfor']);
Route::get('user/type/{type}', [userController::class, 'userType']);
Route::get('user/delete/{id}', [userController::class, 'destroy']);
Route::post('user/update/{data}', [userController::class, 'update']);
Route::get('user/search', [userController::class, 'search']);
Route::get('user/check', [userController::class, 'checkDup']);
Route::resource('user', userController::class);
Route::get('question/delete/{id}', [questionController::class, 'destroy']);
Route::resource('question', questionController::class);
Route::get('register/delete/{id}', [ClassRegisterController::class, 'destroy']);
Route::resource('register', ClassRegisterController::class);
Route::get('class/checkclass/{id}', [ClassController::class, 'checkClass']);
Route::get('class/checkpt', [ClassController::class, 'checkPT']);
Route::get('class/type/{type}', [ClassController::class, 'classType']);
Route::get('class/infor/{id}', [ClassController::class, 'classInfor']);
Route::get('class/delete/{id}', [ClassController::class, 'destroy']);
Route::get('class/search', [ClassController::class, 'search']);
Route::post('class/update/{data}', [ClassController::class, 'update']);
Route::resource('class', ClassController::class);
Route::resource('member', MemberController::class);
Route::resource('trainer', TrainerController::class);
Route::get('storage/search', [StorageController::class, 'search']);
Route::get('storage/delete/{id}', [StorageController::class, 'destroy']);
Route::post('storage/update/{data}', [StorageController::class, 'update']);
Route::resource('storage', StorageController::class);
Route::get('pack/delete/{id}', [PackController::class, 'destroy']);
Route::get('pack/search', [PackController::class, 'search']);
Route::post('pack/update/{data}', [PackController::class, 'update']);
Route::resource('pack', PackController::class);
Route::get('pack_register/delete/{id}', [PackRegisterController::class, 'destroy']);
Route::resource('pack_register', PackRegisterController::class);
Route::post('schedule/update/{data}', [ScheduleController::class, 'update']);
Route::get('schedule/delete/{id}', [ScheduleController::class, 'destroy']);
Route::resource('schedule', ScheduleController::class);
Route::get('order/delivered/{id}', [OrderController::class, 'delivered']);
Route::get('order/delete/{id}', [OrderController::class, 'destroy']);
Route::get('order/search', [OrderController::class, 'search']);
Route::resource('order', OrderController::class);
Route::get('room/detail/{id}', [RoomController::class, 'show2']);
Route::get('room/search', [RoomController::class, 'search']);
Route::get('room/delete/{id}', [RoomController::class, 'destroy']);
Route::post('room/update/{data}', [RoomController::class, 'update']);
Route::resource('room', RoomController::class);
Route::get('news/delete/{id}', [NewsController::class, 'destroy']);
Route::post('news/update/{data}', [NewsController::class, 'update']);
Route::resource('news', NewsController::class);
Route::get('promotion/delete/{id}', [promotionController::class, 'destroy']);
Route::get('promotion/search', [promotionController::class, 'query']);
Route::post('promotion/update/{data}', [promotionController::class, 'update']);
Route::resource('promotion', promotionController::class);
Route::get('index/delete/{id}', [BodyIndexController::class, 'destroy']);
Route::get('index/search', [BodyIndexController::class, 'query']);
Route::post('index/update/{data}', [BodyIndexController::class, 'update']);
route::resource('index', BodyIndexController::class);

//shop
Route::get('ecommerce/search', [HomeShopController::class, 'search']);
Route::get('ecommerce/category/{cate}', [HomeShopController::class, 'category']);
Route::get('ecommerce/cart/delete/{id}', [CartController::class, 'destroy']);
Route::resource('ecommerce/cart', CartController::class);
Route::resource('ecommerce', HomeShopController::class);
//mail
Route::get('orderMail', [MailController::class, 'order']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
