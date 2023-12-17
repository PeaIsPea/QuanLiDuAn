<?php

use App\Common\Helper;
use App\Common\Constant;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Str;
use App\Http\Middleware\AuthStore;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\KeyController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PublisherController as AdminPublicController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Permission;

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


/**
 * Common Page
 */
Route::get('/', [GameController::class, 'index'])->name('index');
Route::get('/game-detail/{id}', [GameController::class, 'detail_game'])->name('detailgame');
Route::get('/tim-kiem', [GameController::class, 'search'])->name('searchPage');
Route::post('/like/{id}', [GameController::class, 'likeGame'])->name('likeGame');
Route::get('/policy', function () {
    return view('policy');
})->name('policy');
Route::get('/tos', function () {
    return view('tos');
})->name('tos');
Route::get('/tos', function () {
    return view('tos');
})->name('tos');

/**
 * Normal Authenticate
 */

Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::get('/dang-ky', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/createUser', [AuthController::class, 'createUser'])->name('createUser');
Route::get('/dang-xuat', [AuthController::class, 'logoutUser'])->name('logoutUser');
Route::get('/auth/verify', [AuthController::class, 'verifyAccount'])->name('verify');
Route::get('/verify', [AuthController::class, 'verifyAccount'])->name('verifyResult');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password/send', [AuthController::class, 'sendResetPasswordMail'])->name('reset-send');
Route::get('/resetPassword', [AuthController::class, 'resetPasswordForm'])->name('resetForm');
Route::put('/auth/resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');

/**
 * Social Authenticate
 */
Route::get('/auth/gg', [AuthController::class, 'loginGoogle'])->name('loginGoogle');
Route::get('/auth/gg/callback', [AuthController::class, 'loginGoogleUser']);
Route::get('/auth/fb', [AuthController::class, 'loginFacebook'])->name('loginFacebook');
Route::get('/auth/fb/callback', [AuthController::class, 'loginFacebookUser']);


/**
 * Order
 */
Route::get('cart', [OrderController::class, 'index'])->name('cart');

// Only when login, these routes can be access
Route::middleware(['auth:sanctum', AuthStore::class])->group(function () {
    /**
     * Order
     */
    Route::delete('cart/remove', [OrderController::class, 'removeItemFromCart'])->name('removeItem');
    Route::put('cart/update', [OrderController::class, 'updateCart'])->name('updateCart');
    Route::post('cart/add', [OrderController::class, 'addToCart'])->name('addToCart');
    Route::post('cart/buyNow', [OrderController::class, 'buyNow'])->name('buyNow');
    // Route::post('checkout/payMomo', [OrderController::class, 'payMomo'])->name('checkoutMomo');
    Route::post('checkout/payVnpay', [OrderController::class, 'payVnpay'])->name('checkoutVnpay');
    Route::get('checkout/successVnpay', [OrderController::class, 'vnpayCheckoutSuccess'])->name('vnpayCheckoutSuccess');
    // Route::get('checkout/successMomo', [OrderController::class, 'momoCheckoutSuccess'])->name('momoCheckoutSuccess');
    Route::post('/cancelOrder/{order_id}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');

    /**
     * User
     */
    Route::get('user/infor', [UserController::class, 'inforUser'])->name('inforUser');
    Route::post('user/edit', [UserController::class, 'editUser'])->name('editUser');
    Route::put('user/changepassword', [UserController::class, 'changePassword'])->name('changePassword');
});

Route::get('/assignform', [TestController::class, 'form'])->name('genreAssign');
Route::post('/assign', [TestController::class, 'assignGen'])->name('assignGen');
Route::post('/addGen', [TestController::class, 'addGen'])->name('addGen');

//========================= ADMIN =========================//

Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/loginAdmin', [AdminAuthController::class, 'loginForm'])->name('adminloginform');
    Route::post('/loginAdminUser', [AdminAuthController::class, 'login'])->name('loginadmin');
    Route::get('/logoutAdmin', [AdminAuthController::class, 'logout'])->name('logoutadmin');

    Route::get('info', [AdminAuthController::class, 'info'])->name('admininfo');
    Route::get('', [DashboardController::class, 'Index']);
    Route::get('/dashboard', [DashboardController::class, 'Index'])->name('admindashboard');

    Route::prefix('game')->group(function () {
        Route::get('', [AdminGameController::class, 'index'])->name('admingame');
        // Route::get('/add', [AdminGameController::class, 'add'])->name('addgame');
        Route::post('/store', [AdminGameController::class, 'store'])->name('storegame');
        Route::get('/edit/{id}', [AdminGameController::class, 'edit'])->name('editgame');
        // "Post" method because Laravel can't handle update image with "Put" method
        Route::post('/update/{id}', [AdminGameController::class, 'update'])->name('updategame');
        Route::delete('/delete/{id}', [AdminGameController::class, 'delete'])->name('deletegame');
    });

    Route::prefix('genre')->group(function () {
        Route::get('', [AdminGenreController::class, 'index'])->name('admingenre');
        // Route::get('/add', [AdminGenreController::class, 'create'])->name('addgenre');
        Route::post('/store', [AdminGenreController::class, 'store'])->name('storegenre');
        // Route::get('/edit/{id}', [AdminGenreController::class, 'edit'])->name('editgenre');
        Route::put('/update/{id}', [AdminGenreController::class, 'update'])->name('updategenre');
        Route::delete('/delete/{id}', [AdminGenreController::class, 'delete'])->name('deletegenre');
    });

    Route::prefix('publisher')->group(function () {
        Route::get('', [AdminPublicController::class, 'index'])->name('adminpublisher');
        // Route::get('/add', [AdminPublicController::class, 'create'])->name('addpublisher');
        Route::post('/store', [AdminPublicController::class, 'store'])->name('storepublisher');
        // Route::get('/edit/{id}', [AdminPublicController::class, 'edit'])->name('editpublisher');
        Route::put('/update/{id}', [AdminPublicController::class, 'update'])->name('updatepublisher');
        Route::delete('/delete/{id}', [AdminPublicController::class, 'delete'])->name('deletepublisher');
    });

    Route::prefix('user')->group(function () {
        Route::get('', [AdminUserController::class, 'index'])->name('adminuser');
        Route::get('/add', [AdminUserController::class, 'create'])->name('adduser');
        Route::post('/store', [AdminUserController::class, 'store'])->name('storeuser');
        Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('updateuser');
        // It should be 'disable user' or something like that, idk
        Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('deleteuser');
    });

    Route::prefix('role')->group(function () {
        Route::get('', [RoleController::class, 'index'])->name('adminrole');
        Route::post('/store', [RoleController::class, 'store'])->name('storerole');
        Route::put('/update/{id}', [RoleController::class, 'update'])->name('updaterole');
        Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('deleterole');
        Route::put('/activate/{id}', [RoleController::class, 'activate'])->name('activaterole');
    });

    Route::prefix('permission')->group(function () {
        Route::get('', [PermissionController::class, 'index'])->name('adminpermission');
        Route::post('/store', [PermissionController::class, 'store'])->name('storepermission');
        Route::put('/update/{id}', [PermissionController::class, 'update'])->name('updatepermission');
        Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('deletepermission');
        Route::put('/activate/{id}', [PermissionController::class, 'activate'])->name('activatepermission');
    });

    Route::prefix('key')->group(function () {
        Route::get('', [KeyController::class, 'index'])->name('adminkey');
        Route::post('/store', [KeyController::class, 'store'])->name('storekey');
        Route::put('/update/{id}', [KeyController::class, 'update'])->name('updatekey');
        Route::delete('/delete/{id}', [KeyController::class, 'delete'])->name('deletekey');
    });
    
    Route::prefix('order')->group(function () {
        Route::get('', [AdminOrderController::class, 'index'])->name('adminorder');
        Route::get('/detail', [AdminOrderController::class, 'detail'])->name('adminorderdetail');
        Route::delete('/delete/{id}', [AdminOrderController::class, 'delete'])->name('deleteorder');
    });
});