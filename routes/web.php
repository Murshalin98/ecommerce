<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BlogController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

Route::redirect('/home', '/dashboard', 301);
// Route::get('/home', 'DashboardController@dashboard')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/add', 'CategoryController@CategoryAdd')->name('CategoryAdd');
Route::post('/category-post', 'CategoryController@CategoryPost')->name('CategoryPost');
Route::get('/category/delete/{cat_id}', 'CategoryController@CategoryDelete')->name('CategoryDalele');
Route::get('/category/edit/{cat_id}', 'CategoryController@CategoryEdit')->name('CategoryEdit');
Route::get('/category/restore/{cat_id}', 'CategoryController@CategoeyRestore')->name('CategoeyRestore');
Route::get('/category/destroy/{cat_id}', 'CategoryController@CategoryDestroy')->name('CategoryDestroy');
Route::post('/category-update', 'CategoryController@CategoryUpdate')->name('CategoryUpdate');
Route::get('/category/trash', 'CategoryController@CategoryTrash')->name('CategoryTrash');
Route::get('/category/empty', 'CategoryController@CategoryEmpty')->name('CategoryEmpty');
Route::get('/category/all/delete', 'CategoryController@CategoryAllDelete')->name('CategoryAllDelete');

Route::get('/sub-category', 'SubCategoryController@index')->name('SubCategory');
Route::get('/sub-category/add', 'SubCategoryController@SubCategoryAdd')->name('SubCategoryAdd');
Route::post('/sub-category/post', 'SubCategoryController@SubCategoryPost')->name('SubCategoryPost');
Route::post('/sub-category/update', 'SubCategoryController@SubCategoryUpdate')->name('SubCategoryUpdate');
Route::get('/sub-category/delete/{scat_id}', 'SubCategoryController@SubCategoryDelete')->name('SubCategoryDelete');
Route::get('/sub-category/edit/{scat_id}', 'SubCategoryController@SubCategoryEdit')->name('SubCategoryEdit');
Route::get('/sub-category/trash', 'SubCategoryController@SubCategoryTrash')->name('SubCategoryTrash');
Route::get('/sub-category/restore/{scat_id}', 'SubCategoryController@SubCategoryRestore')->name('SubCategoryRestore');
Route::get('/sub-category/destroy/{scat_id}', 'SubCategoryController@SubCategoryDestroy')->name('SubCategoryDestroy');

Route::get('/products/list', 'ProductsController@products_list')->name('ProductsList');
Route::get('/products/add', 'ProductsController@products_add')->name('ProductsAdd');
Route::post('/products/post', 'ProductsController@products_addPost')->name('ProductsAddPost');
Route::get('/products/delete/{product_id}', 'ProductsController@products_delete')->name('ProductsDelete');
Route::get('/products/trash', 'ProductsController@products_trash')->name('ProductsTrash');
Route::get('/products/restore/{product_id}', 'ProductsController@products_restore')->name('ProductsRestore');
Route::get('/products/destroy/{product_destroy}', 'ProductsController@products_destroy')->name('ProductsDestroy');
Route::get('/sub-category/get-ajax-list/{id}', 'ProductsController@sub_category_ajax_list')->name('SubCatAjaxList');
Route::get('/products/single-picture/delete/{id}', 'ProductsController@single_picture_delete')->name('SinglePictureDeletePro');
Route::get('/products/edit/{id}', 'ProductsController@products_edit')->name('ProductsEdit');
Route::post('/products/update', 'ProductsController@products_update')->name('ProductsUpdate');

Route::get('/colors', 'ColorController@index')->name('ColorsIndex');
Route::post('/colors', 'ColorController@add_post')->name('AddPost');
Route::get('/colors/delete/{color_id}', 'ColorController@color_delete')->name('ColorsDelete');
Route::post('/colors/update', 'ColorController@color_update')->name('ColorsUpdate');

Route::get('/about', 'AboutController@about_details')->name('AboutDetails');
Route::post('/about', 'AboutController@about_details_post')->name('AboutDetailsPost');
Route::post('/about/update', 'AboutController@about_details_update')->name('AboutDetailsUpdate');
Route::get('/about/delete/{id}', 'AboutController@about_details_delete')->name('AboutDetailsDelete');

Route::get('/faq/genarel', 'FaqController@genarel_faq')->name('GenarelFAQ');
Route::post('/faq/genarel', 'FaqController@genarel_faq_post')->name('GenarelFaqPost');
Route::post('/faq/update', 'FaqController@genarel_faq_update')->name('GenarelFaqUpdate');
Route::get('/faq/delete/{id}', 'FaqController@genarel_faq_delete')->name('GenarelFaqDelete');

Route::get('/', 'FrontendController@front')->name('front');
Route::get('/shop', 'FrontendController@shop')->name('Shop');
Route::get('/item/{slug}', 'FrontendController@product_details')->name('ProductsDetails');
Route::get('product/get/size/{color_id}/{product_id}', 'FrontendController@GetSize')->name('colorid');

Route::get('/cart', 'CartController@carts')->name('Carts');
Route::get('cart/{coupon_code}', [CartController::class, 'carts'])->name('CouponCode');
Route::get('/single/cart/delete/{id}', 'CartController@SingleCartDelete')->name('SingleCartDelete');
Route::get('cart/single/{id}', [CartController::class, 'single_cart'])->name('SingleCart');
Route::post('cart', [CartController::class, 'cart_post'])->name('CartPost');
Route::post('cart/update', [CartController::class, 'cart_update'])->name('CartUpdate');
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('CheckOut');

Route::post('payment', [PaymentController::class, 'payment'])->name('Payment');
Route::get('payment/status', [PaymentController::class, 'payment_status'])->name('PaymentStatus');

Route::get('orders/all', [DashboardController::class, 'all_orders'])->name('AllOrders');
Route::get('orders/export', [DashboardController::class, 'exportExcel'])->name('exportExcel');


// Role Permission
Route::get('role/manager', [RoleController::class, 'role_manager'])->name('RoleManager');
Route::post('role/add-permission', [RoleController::class, 'role_add_permission'])->name('RoleAddtoPermission');
Route::post('role/add-user', [RoleController::class, 'role_add_user'])->name('RoleAddtoUser');
Route::get('role/permission/edit/{id}', [RoleController::class, 'edit_user_permission'])->name('EditUserPermission');
Route::post('role/permission/change', [RoleController::class, 'permission_change_user'])->name('PermissionChangeUser');

// Social Login
Route::get('login/github', [SocialController::class, 'redirectToProvider'])->name('GithubLogin');
Route::get('login/github/callback', [SocialController::class, 'handleProviderCallback'])->name('GithubCallback');

Route::get('login/google', [SocialController::class, 'googleRedirectToProvider'])->name('GoogleLogin');
Route::get('login/google/callback', [SocialController::class, 'googleHandleProviderCallback'])->name('GoogleCallback');


// Blog Route
Route::resource('blog', 'BlogController');

Route::get('article', 'FrontendController@all_article')->name('AllArticle');
Route::get('article/{slug}', 'FrontendController@single_article')->name('SingleArticle');



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
