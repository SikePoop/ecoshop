<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'Index')->name('Home');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}{slug}', 'CategoryPage')->name('category');
    Route::get('/subcategory/{id}{slug}', 'SubCategoryPage')->name('subcategory');
    Route::get('/singleproduct/{id}{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
    Route::get('/checkout', 'Checkout')->name('checkout');
    Route::get('/blog', 'Blog')->name('blog');
    Route::get('/about', 'About')->name('about');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/user-profile', 'UserProfile')->name('userprofile');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:admin'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin'){
            return view('admin.dashboard');
        }else {
            return redirect()->route('Home');
        }
    }
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'role:admin')->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/admin/dashboard', 'Dashboard')->name('admin.dashboard');
        Route::get('/admin/feedback', 'ContactMessage')->name('admin.feedback');
        Route::get('/admin/logout', 'Logout')->name('admin.logout');

        //blog
        Route::get('/admin/create-blog', 'CreateBlog')->name('admin.createblog');
        Route::get('/admin/edit-blog/{id}', 'EditBlog')->name('admin.editblog');
        Route::post('/admin/update-blog', 'UpdateBlog')->name('admin.updateblog');
        Route::post('/admin/store-blog', 'StoreBlog')->name('admin.storeblog');
        Route::get('/admin/all-blog', 'AllBlog')->name('admin.allblog');
        Route::get('/admin/delete-blog/{id}', 'DeleteBlog')->name('admin.deleteblog');

        //blog post
        Route::get('/admin/create-blogpost', 'CreateBlogpost')->name('admin.createblogpost');
        Route::get('/admin/edit-blogpost/{id}', 'EditBlogpost')->name('admin.editblogpost');
        Route::post('/admin/update-blogpost', 'UpdateBlogpost')->name('admin.updateblogpost');
        Route::post('/admin/store-blogpost', 'StoreBlogpost')->name('admin.storeblogpost');
        Route::get('/admin/all-blogpost', 'AllBlogpost')->name('admin.allblogpost');
        Route::get('/admin/delete-blogpost/{id}', 'DeleteBlogpost')->name('admin.deleteblogpost');

        //supplier
        Route::get('/admin/create-supplier', 'AddSupplier')->name('admin.addsupplier');
        Route::get('/admin/edit-supplier/{id}', 'EditSupplier')->name('admin.editsupplier');
        Route::post('/admin/update-supplier', 'UpdateSupplier')->name('admin.updatesupplier');
        Route::post('/admin/store-supplier', 'StoreSupplier')->name('admin.storesupplier');
        Route::get('/admin/all-supplier', 'AllSupplier')->name('admin.allsupplier');
        Route::get('/admin/delete-supplier/{id}', 'DeleteSupplier')->name('admin.deletesupplier');

        //supply
        Route::get('/admin/create-supply', 'CreateSupply')->name('admin.createsupply');
        Route::get('/admin/edit-supply/{id}', 'EditSupply')->name('admin.editsupply');
        Route::post('/admin/update-supply', 'UpdateSupply')->name('admin.updatesupply');
        Route::post('/admin/store-supply', 'StoreSupply')->name('admin.storesupply');
        Route::get('/admin/all-supply', 'AllSupply')->name('admin.allsupply');
        Route::get('/admin/delete-supply/{id}', 'DeleteSupply')->name('admin.deletesupply');


        // Category
        Route::get('/admin/create-category', 'CreateCategory')->name('admin.createcategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('admin.editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('admin.updatecategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('admin.storecategory');
        Route::get('/admin/all-category', 'AllCategory')->name('admin.allcategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('admin.deletecategory');
        Route::post('/admin/activate-category', 'ActivateCategory')->name('admin.activatecategory');
        Route::post('/admin/deactivate-category', 'DeactivateCategory')->name('admin.deactivatecategory');

        // Sub Category
        Route::get('/admin/create-sub-category', 'CreateSubCategory')
        ->name('admin.createsubcategory');
        Route::post('/admin/store-sub-category', 'StoreSubCategory')
        ->name('admin.storesubcategory');
        Route::get('/admin/all-sub-category', 'AllSubCategory')
        ->name('admin.allsubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubcategory')->name('admin.editsubcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('admin.updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('admin.deletesubcategory');
        Route::post('/admin/activate-subcategory', 'ActivateSubCategory')->name('admin.activatesubcategory');
        Route::post('/admin/deactivate-subcategory', 'DeactivateSubCategory')->name('admin.deactivatesubcategory');
    });
    Route::controller(ProductController::class)->group(function() {
        Route::get('/admin/add-product', 'AddProduct')->name('admin.addproduct');
        Route::get('/admin/all-product', 'AllProduct')->name('admin.allproducts');
        Route::post('/admin/store-product', 'StoreProduct')->name('admin.storeproducts');
        Route::get('/admin/edit-product-img/{id}', 'EditProductImg')
        ->name('admin.editproductimg');
        Route::get('/admin/edit-product/{id}', 'EditProduct')
        ->name('admin.editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')
        ->name('admin.updateproduct');
        Route::post('/admin/delete-product', 'DeleteProduct')
        ->name('admin.deleteproduct');
        Route::post('/admin/activate-product', 'ActivateProduct')
        ->name('admin.activateproduct');
        Route::post('/admin/deactivate-product', 'DeactivateProduct')
        ->name('admin.deactivateproduct');
        Route::post('/admin/update-product-img', 'UpdateProductImg')
        ->name('admin.updateproductimg');

    });

    Route::controller(OrderController::class)->group(function() {
        Route::get('/admin/pending-order','Index')->name('pendingorder');
        Route::post('/admin/approve','Approve')->name('approve');
    });
    Route::controller(MessageController::class)->group(function() {
        Route::get('/admin/feedback','Index')->name('feedback');
        Route::get('/admin/getfeedback/{id}','GetFeedback')->name('getfeedback');
        Route::post('/admin/storefeedback','StoreFeedback')->name('storefeedback');
        Route::get('/admin/editfeedback/{id}','EditFeedback')->name('editfeedback');
        Route::post('/admin/updatefeedback','UpdateFeedback')->name('updatefeedback');
    });
});

Route::middleware('auth', 'role:user')->group(function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/show-cart', 'ShowCart')->name('showcart');
        Route::post('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::get('/shipping-address', 'ShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
        Route::post('/checkout', 'Checkout')->name('checkout');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/blog', 'Blog')->name('blog');
        Route::get('/about', 'About')->name('about');
        Route::get('/contact', 'Contact')->name('contact');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'PendingOrders')
        ->name('pendingorders');
        Route::post('/user-profile/message', 'Message')
        ->name('message');
        Route::get('/user-profile/showmessage', 'ShowMessage')
        ->name('showmessage');
        Route::get('/user-profile/history', 'History')
        ->name('history');
        Route::get('remove-cart-item/{id}', 'removeCartItem')
        ->name('removecartitem');
        Route::get('/logout', 'Logout')->name('logout');
        });
});

require __DIR__.'/auth.php';
