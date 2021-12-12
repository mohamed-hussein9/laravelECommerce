<?php

use App\Http\Controllers\addtocart;
use App\Http\Controllers\test;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\EditProductComponet;
use App\Http\Livewire\Admin\Home\AddSlideComponent;
use App\Http\Livewire\Admin\Home\EditSlideComponent;
use App\Http\Livewire\Admin\Home\HomeSlideComponent;
use App\Http\Livewire\Admin\HomeProductsComponent;
use App\Http\Livewire\Admin\SaleComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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

Route::get('/', HomeComponent::class);
Route::get('/cart', CartComponent::class)->name('products.cart');
Route::get('/shop', ShopComponent::class);
Route::get('/checkout', CheckoutComponent::class);
Route::get('/details/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/addcart', [addtocart::class, 'index']);
Route::get('/test', [test::class, 'index'])->name('test');
Route::get('/search', SearchComponent::class)->name('product.search');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//user routs
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/caregories', CategoryComponent::class)->name('admin.caregories');
    Route::get('/admin/addcategory', AddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/editcategory/{category_slug}', EditCategoryComponent::class)->name('admin.editcategory');
    //products routs
    Route::get('/admin/products', AdminProductsComponent::class)->name('admin.products');
    Route::get('/admin/addproduct', AddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/editproduct/{slug}', EditProductComponet::class)->name('admin.editproduct');

    //home slide routes
    Route::get('/admin/homesliders', HomeSlideComponent::class)->name('admin.homesliders');
    Route::get('/admin/addslider', AddSlideComponent::class)->name('admin.addslider');
    Route::get('/admin/editSlider/{id}', EditSlideComponent::class)->name('admin.editslider');
    Route::get('/admin/homeproducts',HomeProductsComponent::class)->name('homeproducts');
    Route::get('/admin/sale',SaleComponent::class)->name('admin.sale');
});
