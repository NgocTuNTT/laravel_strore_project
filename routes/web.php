<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

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



Route::middleware('auth', 'isAdmin')->prefix('admin')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Phân quyên
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->middleware('role:super-admin')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
    });






    //Admin
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');
        Route::post('/', 'store')->name('store')->middleware('permission:show-user');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-user');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-user');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-user');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-user');
    });

    //Chia quyền
    Route::prefix('permission')->controller(PermissionsController::class)->name('permission.')->middleware('role:super-admin')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
    });



    //danh mục
    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-category');
        Route::post('/', 'store')->name('store')->middleware('permission:show-category');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-category');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-category');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-category');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-category');
    });
    //khách hàng
    Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-customer');
        Route::post('/', 'store')->name('store')->middleware('permission:show-customer');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-customer');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-customer');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-customer');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-customer');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-customer');
    });

    //Thương hiệu
    Route::prefix('brand')->controller(BrandController::class)->name('brand.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-brand');
        Route::post('/', 'store')->name('store')->middleware('permission:show-brand');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-brand');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-brand');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-brand');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-brand');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-brand');
    });

    // Sản Phẩm
    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-product');
        Route::post('/', 'store')->name('store')->middleware('permission:show-product');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-product');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-product');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-product');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-product');
        // xóa ảnh product
        Route::get('/{coupon}', 'destroyIMG')->name('destroyIMG')->middleware('permission:delete-product');

        Route::post('/product-color/{prod_color_id}', 'updateProductColor');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProductColor');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-product');
    });
    // Sản Phẩm
    Route::prefix('color')->controller(ColorsController::class)->name('color.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-color');
        Route::post('/', 'store')->name('store')->middleware('permission:show-color');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-color');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-color');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-color');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-color');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-color');
    });

    // Sản Phẩm
    Route::prefix('slide')->controller(SlideController::class)->name('slide.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-slide');
        Route::post('/', 'store')->name('store')->middleware('permission:show-slide');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-slide');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-slide');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-slide');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-slide');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-slide');
    });

    // Đơn hàng
    Route::prefix('order')->controller(OrderController::class)->name('order.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-order');
        Route::post('/', 'store')->name('store')->middleware('permission:show-order');
        Route::delete('/', 'destroy')->name('destroy')->middleware('permission:delete-order');
        Route::get('/{id}/view', 'view')->name('view')->middleware('permission:view-order');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-order');
    });
    // setting
    Route::prefix('setting')->controller(SettingController::class)->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-setting');
        Route::post('/', 'store')->name('store')->middleware('permission:show-setting');
    });
});







require __DIR__ . '/auth.php';







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes();





Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('index');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);


Route::get('/danh-muc', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/danh-muc/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/danh-muc/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'details']);

Route::get('/danh-muc/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'details']);








Route::middleware('auth')->group(function () {
    Route::get('/wish-list', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlist']);
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart']);
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkout']);






    Route::prefix('profile1')->controller(FrontendProfileController::class)->name('profile1.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/order/{id}', 'order')->name('order');
    });
});
