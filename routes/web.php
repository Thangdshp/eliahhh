<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|S
*/
// Admin 
Route::group(['prefix'=>'admin','namespace' => 'Admin'], function () {
    Route::get('/login','DashboardController@getLogin')->name('admin.getLogin');
    Route::post('/login','DashboardController@postLogin')->name('admin.postLogin');
    
    Route::group(['middleware' => 'checkAdminLogin'], function () {
        Route::get('/','DashboardController@index')->name('admin');
        Route::get('user/profile','UserController@profile')->name('user.profile');
        Route::post('user/updateImage','UserController@updateImage')->name('user.updateImage');
        Route::resources([
            'brand'=>'BrandController', 
            'color'=>'ColorController',
            'feature'=>'FeatureController',
            'payment'=>'PaymentController',
            'categoryBlog'=>'CategoryBlogController',
            'priceSpace'=>'PriceSpaceController',
            'user'=>'UserController',
            'category'=>'CategoryController',
            'product'=>'ProductController',
            'productDetail'=>'ProductDetailController',
            'productDetailImages'=>'ProDetailImageController',
            'discountCode'=>'DiscountCodeController',
            'banner'=>'BannerController',
            'slideshow'=>'SlideshowController',
            'blog'=>'BlogController',
            'service'=>'ServiceController'
        ]);
        Route::get('getImgBanner/{id}','BannerController@getImg')->name('getImgBanner');
        Route::group(['prefix' => 'order'], function () {
            Route::get('progress','OrderController@indexProgress')->name('order.indexProgress');
            Route::get('accept','OrderController@indexAccept')->name('order.indexAccept');
            Route::get('successful','OrderController@indexSuccessful')->name('order.indexSuccessful');
            Route::get('refuse','OrderController@indexRefuse')->name('order.indexRefuse');
            Route::get('edit/{id}','OrderController@edit')->name('order.edit');
            Route::post('update/{id}','OrderController@update')->name('order.update');
        });
        Route::group(['prefix' => 'newLetter'], function () {
            Route::get('/','NewLetterController@index')->name('newLetter.index');
            Route::get('/sendEmail','NewLetterController@getSendEmail')->name('newLetter.send');
            Route::post('/sendEmailPost','NewLetterController@sendEmail')->name('newLetter.post');
            Route::post('/delete/{id}','NewLetterController@delete')->name('newLetter.delete');
        });
        Route::group(['prefix' => 'configPage'], function () {
            Route::get('/','ConfigWebController@index')->name('configPage.index');

            Route::get('/effect','ConfigWebController@addE')->name('configPage.addE');
            Route::get('/effect/edit/{id}','ConfigWebController@editEffect')->name('configPage.editEffect');
            Route::post('/effect/update/{id}','ConfigWebController@updateEffect')->name('configPage.updateEffect');
            Route::post('/effectPost','ConfigWebController@effectPost')->name('configPage.effectPost');

            Route::get('/info','ConfigWebController@addI')->name('configPage.addI');
            Route::get('/info/edit/{id}','ConfigWebController@editInfo')->name('configPage.editInfo');
            Route::post('/infoPost','ConfigWebController@inforPost')->name('configPage.inforPost');
            Route::post('/info/update/{id}','ConfigWebController@updateInfo')->name('configPage.updateInfo');

            Route::get('/delete/{id}','ConfigWebController@delete')->name('configPage.delete');
            
        }); 
        
        Route::get('productDetail/create_product/{id}','ProductDetailController@createCustom')->name('productDetail.createCustom');
        Route::post('user/status','UserController@updateStatus')->name('user.updateStatus');
        Route::get('/logout','DashboardController@getLogout')->name('admin.getLogout');
    });

});







// User 
Route::group(['namespace'=>'Customer'], function () {
    
    Route::get('/','HomeController@index')->name('index');

    Route::get('/Contact','HomeController@contact')->name('contact');
    Route::post('/ContactPost','HomeController@postContact')->name('postContact');
    Route::get('/shop/{category?}/{feature?}/{price?}/{namePro?}/{orderBy?}','ShopController@index')->name('shop');
    Route::get('/product/show/{category}','ShopController@show')->name('product.show');
    Route::get('/product-detail/{namePro}/{id}','ShopController@showProductDetail')->name('product-detail');
    Route::get('/product-detail-get-price/{id}','ShopController@getPrice')->name('product-detail-getPrice');
    Route::get('/product-detail/description/id/{id}','ShopController@showDescription')->name('product-show-description');    
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/','CartController@index')->name('cart');
        Route::get('add/{id}','CartController@add')->name('add.cart');
        Route::get('remove/{id}','CartController@remove')->name('add.remove');
        Route::get('clear','CartController@clear')->name('add.clear');
        Route::get('show','CartController@show')->name('add.show');
        Route::get('update/id/{id}/quantity/{quantity}','CartController@update')->name('add.update');
        Route::get('checkCode/{nameCode}','CartController@checkCode')->name('cart.checkCode');
    });
    
    Route::group(['middleware' => 'checkCustomerLogin'], function () {
        Route::get('/Checkout','CheckOutController@index')->name('checkout');
        Route::get('/profile_customer','CustomerController@index')->name('profile.customer');
        Route::get('/list_order_history/{status}','CustomerController@listHistory')->name('profile.listHistory');
        Route::post('/order_custom_delete/{id}','CustomerController@delete')->name('profile.order_delete');
        Route::post('createOrder','CheckOutController@createOrder')->name('cart.createOrder');
        Route::post('/profile_update/{id}','CustomerController@update')->name('profile.customeUpdate');
        Route::get('/review/product/{id}','CustomerController@review')->name('review.get');
        Route::post('/review/post','CustomerController@postReview')->name('review.post');
        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('/','WishlistController@index')->name('wishlist');
            Route::get('add/{id}','WishlistController@add')->name('wishlist.add');
            Route::get('remove/{id}','WishlistController@remove')->name('wishlist.remove');
            Route::get('clear','WishlistController@clear')->name('wishlist.clear');
        });
    });
    Route::post('/sendSerive','ServiceCustomerController@sendEmail')->name('sendService');
    Route::get('newLetterGet/{email}','HomeController@newLetter')->name('NewLetter');

    Route::get('/blog/{slug?}','BlogCustomerController@index')->name('blog');
    Route::get('/blog-detail/{id}','BlogCustomerController@blogDetail')->name('blog-detail');

    Route::get('/Error', function () {
        return view('frontEnd/Error');
    })->name('errorPage');
    Route::get('/services','HomeController@service')->name('service');
    Route::get('/about', function () {
        return view('frontEnd/about');
    })->name('about');
   
    Route::post('/registration','HomeController@registration')->name('customer.registration');
    Route::get('/login','HomeController@login')->name('customer.login');
    Route::post('/login','HomeController@login_post')->name('customer.login_post');
    Route::get('/logout','HomeController@logout')->name('customer.logout');

    Route::get('/forgotPassword','ForgotPasswordController@index')->name('forgotPassword.index');
    Route::post('post/reset-password', 'ForgotPasswordController@sendMail')->name('resetPasswordPost');
    Route::get('reset-password/{token}', 'ForgotPasswordController@resetIndex')->name('resetPasswordIndex');
    Route::post('reset-password-post', 'ForgotPasswordController@reset')->name('updateReset');
});

