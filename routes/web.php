<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});
Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.'], function () {
    Route::namespace('Admin')->group(function () {
        Route::group(['middleware' => ['role:admin|superadmin|clerk, guard:employee']], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::namespace('Products')->group(function () {
                Route::resource('products', 'ProductController');
                Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
                Route::get('remove-image-thumb', 'ProductController@removeThumbnail')->name('product.remove.thumb');
                Route::get('import', 'ProductController@getImport')->name('import');
                Route::post('import_parse', 'ProductController@parseImport')->name('import_parse');
                Route::post('import_process', 'ProductController@processImport')->name('import_process');
            });
            Route::namespace('Customers')->group(function () {
                Route::resource('customers', 'CustomerController');
                Route::resource('customers.addresses', 'CustomerAddressController');
            });
            Route::namespace('Packs')->group(function () {
                Route::resource('packs', 'PackController');
                Route::delete('packs/{id}/pack', 'PackController@delete')->name('packs.delete');
                Route::post('packs/{id}/modify', 'PackController@modify')->name('packs.modify');
            });
            Route::namespace('Categories')->group(function () {
                Route::resource('categories', 'CategoryController');
                Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            });
            Route::namespace('Orders')->group(function () {
                Route::resource('orders', 'OrderController');
                Route::resource('order-statuses', 'OrderStatusController');
                Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            });
            Route::resource('addresses', 'Addresses\AddressController');
            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
            Route::resource('couriers', 'Couriers\CourierController');
            Route::resource('attributes', 'Attributes\AttributeController');
            Route::resource('attributes.values', 'Attributes\AttributeValueController');
            Route::resource('brands', 'Brands\BrandController');

        });
        Route::group(['middleware' => ['role:admin|superadmin, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
        });

    });

});

/**
 * Frontend routes
 */
Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('cart/login', 'CartLoginController@showLoginForm')->name('cart.login');
    Route::post('cart/login', 'CartLoginController@login')->name('cart.login');
    Route::get('logout', 'LoginController@logout');
});

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', [
        'as' => 'about_path',
        'uses' => 'HomeController@about'
    ]);
    Route::get('/map', 'MapController@index');
    Route::get('/map2', function(){
        $config = array();
        $config['center'] = 'Douala, Cameroon';
        GMaps::initialize($config);
        $map = GMaps::create_map();

        echo $map['js'];
        echo $map['html'];
    });
    Route::get('/blog', [
        'as' => 'blog_path',
        'uses' => 'BlogController@index'
    ]);
    Route::get('/blog/single/{slug}', [
        'as' => 'blog_single',
        'uses' => 'BlogController@singlePost'
    ]);
    Route::get('/blog/tag/{id}', [
        'as' => 'blog_tag',
        'uses' => 'BlogController@tag'
    ]);
    Route::get('/blog/category/{id}', [
        'as' => 'blog_category',
        'uses' => 'BlogController@category'
    ]);
    Route::get('/contact', [
        'as' => 'contact_path',
        'uses' => 'ContactController@index'
    ]);
    Route::post('/contact', [
        'as' => 'post_contact_path',
        'uses' => 'ContactController@store'
    ]);
    Route::get('/tarif', [
        'as' => 'tarif_path',
        'uses' => 'HomeController@tarif'
    ]);
    Route::group(['middleware' => ['auth', 'web']], function () {

        Route::namespace('Payments')->group(function () {
            Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
            Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
            Route::get('cash-on-delivery', 'CashOnDeliveryController@index')->name('cash-on-delivery.index');
            Route::post('cash-on-delivery', 'CashOnDeliveryController@store')->name('cash-on-delivery.store');

        });

        Route::namespace('Addresses')->group(function () {
            Route::resource('country.state', 'CountryStateController');
            Route::resource('state.city', 'StateCityController');
        });

        Route::get('accounts', 'AccountsController@index')->name('accounts');
        Route::get('accounts/{id}', 'AccountsController@completerPack')->name('completerPack');
        Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
        Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
        Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
        Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
        Route::resource('customer.address', 'CustomerAddressController');
       // Route::resource('customer', 'CustomerProfilController');
        Route::put('customer_update','CustomerProfilController@modify')->name('customer.modify');
        Route::get('checkout_table', 'CheckoutTableController@index')->name('checkout_table.index');
        Route::post('checkout_table', 'CheckoutTableController@store')->name('checkout_table.store');
        Route::get('checkout_table/execute', 'CheckoutTableController@executePayPalPayment')->name('checkout_table.execute');
        Route::post('checkout_table/execute', 'CheckoutTableController@charge')->name('checkout_table.execute');
        Route::get('checkout_table/cancel', 'CheckoutTableController@cancel')->name('checkout_table.cancel');
        Route::get('checkout_table/success', 'CheckoutTableController@success')->name('checkout_table.success');
    });
    Route::resource('cart', 'CartController');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("search", 'ProductController@search')->name('search.product');
    Route::get("{product}", 'ProductController@show')->name('front.get.product');
    Route::get("table/{id}", 'TableProductController@index')->name('front.table');
    Route::post('ajaxRequestTable', 'TableProductController@ajaxRequestPost')->name('front.posttable');
    Route::post('ajaxRequestGetTable', 'TableProductController@ajaxRequestGet')->name('front.gettable');
    Route::post('ajaxRequestDeleteTable', 'TableProductController@ajaxRequestDeleteCart')->name('front.deletetable');

});
/*Route::any('{query}', function () {
    return view('comingsoon::comingsoon');
})->where('query', '.*');
Route::get('/', function () {
    return view('comingsoon::comingsoon');
});*/
Route::namespace('Blog')->group(function () {
    Route::get('/post/create', [

        'uses' => 'PostsController@create',
        'as' => 'post.create'

    ]);

    Route::post('/post/store', [


        'uses' => 'PostsController@store',
        'as' => 'post.store'

    ]);
    Route::get('/post/list', [


        'uses' => 'PostsController@index',
        'as' => 'posts'

    ]);
    Route::get('/post/delete/{id}', [


        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'

    ]);
    Route::get('/post/trashed', [


        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'

    ]);
    Route::get('/post/kill/{id}', [


        'uses' => 'PostsController@kill',
        'as' => 'post.kill'

    ]);
    Route::get('/post/restore/{id}', [


        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'

    ]);
    Route::get('/post/edit/{id}', [


        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'

    ]);
    Route::post('/post/update/{id}', [


        'uses' => 'PostsController@update',
        'as' => 'posts.update'

    ]);

    Route::get('/blogcategory/create', [


        'uses' => 'CategoryController@create',
        'as' => 'category.create'

    ]);

    Route::post('/blogcategory/store', [


        'uses' => 'CategoryController@store',
        'as' => 'category.store'

    ]);

    Route::get('/blogcategory/list', [


        'uses' => 'CategoryController@index',
        'as' => 'categories'

    ]);
    Route::get('/blogcategory/edit/{id}', [


        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'

    ]);
    Route::get('/blogcategory/delete/{id}', [


        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'

    ]);
    Route::post('/blogcategory/update/{id}', [


        'uses' => 'CategoryController@update',
        'as' => 'category.update'

    ]);

    Route::get('/tags/list', [

        'uses' => 'TagsController@index',
        'as' => 'tags'

    ]);
    Route::get('/tags/create', [

        'uses' => 'TagsController@create',
        'as' => 'tag.create'

    ]);
    Route::post('/tags/store', [

        'uses' => 'TagsController@store',
        'as' => 'tag.store'

    ]);
    Route::get('/tags/edit/{id}', [

        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'

    ]);
    Route::post('/tags/update/{id}', [

        'uses' => 'TagsController@update',
        'as' => 'tag.update'

    ]);
    Route::get('/tags/delete/{id}', [

        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'

    ]);
  /* front  */
    Route::get('/post/{slug}',[

        'uses' => 'PostsController@singlePost',
        'as' => 'post.single'


    ]);
    Route::get('/category/{id}',[

        'uses' => 'PostsController@category',
        'as' => 'category.single'


    ]);
    Route::get('/tag/{id}',[

        'uses' => 'PostsController@tag',
        'as' => 'tag.single'


    ]);
    Route::get('/results', function(){

        $posts = \App\Models\Blogpost::where('title', 'like', '%' . request('query') .'%')->get();

        return view('results')->with('posts', $posts)
            ->with('title', 'Search results:' .request('query'))
            ->with('categories', \App\Models\Blogcategories::take(7)->get())
            ->with('query', request('query'));

    });

});