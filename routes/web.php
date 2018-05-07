<?php

Auth::routes();

Route::get('/', 'Frontend\HomeController@index');
Route::get('/spa', 'Frontend\SpaCOntroller@index');
Route::get('/restaurant','Frontend\RestaurantController@index');
Route::get('/deportes','Frontend\DeportesController@index');
Route::get('/blog','Frontend\BlogController@index');
Route::get('pago-exitoso/{plan}', 'Frontend\HomeController@exitoso');

Route::post('pay_plan', 'Frontend\HomeController@addPay')->name('pay.plan');


Route::get('pago-rechazado', 'Frontend\HomeController@rechazado');
Route::get('pago-pendiente', 'Frontend\HomeController@pendiente');
Route::get('home', 'Frontend\HomeController@index');
Route::get('como-comprar', 'Frontend\HomeController@como_comprar');
Route::get('empresa', 'Frontend\HomeController@empresa');
Route::get('terminos', 'Frontend\HomeController@terminos');
Route::get('envios', 'Frontend\HomeController@envios');
Route::get('datos', 'Frontend\HomeController@datos');
Route::get('pagos', 'Frontend\HomeController@pagos');
Route::get('gracias', 'Frontend\HomeController@gracias');
Route::get('lista-de-precios', 'Frontend\HomeController@product_list');
Route::get('contacto', 'Frontend\HomeController@contacto');
Route::post('contacto',[
    'as'   => 'contacto',
    'uses' => 'Frontend\HomeController@contacto_submit'
    ]);


Route::resource('invitation', 'Frontend\InvitationController', ['only' => [
    'index', 'store', 'update'
]]);


Route::get('quick-look/{slug}', 'Frontend\ProductController@quick_look');
Route::get('quick-build/{slug}', 'Frontend\ProductController@quick_build');
Route::get('products/category', 'Frontend\ProductController@category');
Route::get('products/subcategory', 'Frontend\ProductController@subcategory');
Route::get('products/brand', 'Frontend\ProductController@brand');
Route::get('product/{slug}', 'Frontend\ProductController@product');
Route::get('special/{slug}', 'Frontend\ProductController@special');
Route::get('arma-tu-pc', 'Frontend\ProductController@sel_tipo');
Route::get('arma-tu-pc/{tecnologia}', 'Frontend\ProductController@arma_pc');
Route::get('search_product', 'Frontend\ProductController@search_product');

Route::post('add_cart/{slug}',[
    'as'   => 'add.cart',
    'uses' => 'Frontend\CartController@add_cart'
    ]);
Route::get('remove_cart/{rowId}', 'Frontend\CartController@remove_cart');
Route::post('pay_cart', 'Frontend\CartController@pay_cart');
Route::get('payment_notifications', 'Frontend\CartController@payment_notifications');

Route::get('view_cart', 'Frontend\CartController@view_cart');
Route::get('payment_methods/{method}',[
    'as'   => 'payment_methods',
    'uses' => 'Frontend\CartController@payment_methods'
    ]);

Route::get('cart_callback/{orders_id}', 'Frontend\CartController@cart_callback');

Route::get('perfil', 'Frontend\PerfilController@perfil');
Route::post('perfil',[
    'as'   => 'perfil',
    'uses' => 'Frontend\PerfilController@perfil_update'
    ]);

Route::post('upload_avatar', 'Frontend\PerfilController@upload_avatar');

Route::post('notify_product', 'Frontend\PerfilController@notify_product');
Route::get('listas-de-deseo', 'Frontend\PerfilController@wishlist');
Route::get('user-orders', 'Frontend\PerfilController@order');
Route::get('user-custom-pc', 'Frontend\PerfilController@userCustomPc');
Route::get('view_build/{id}', 'Frontend\PerfilController@view_build');
Route::get('pc_build', 'Frontend\CartController@build_result');
Route::post('pc_build', 'Frontend\CartController@build_result');
Route::post('remove_build/{config}',[
    'as'   => 'remove_build',
    'uses' => 'Frontend\PerfilController@remove_build'
    ]);

Route::post('build_cart/{id}',[
    'as'   => 'build_cart',
    'uses' => 'Frontend\PerfilController@build_cart'
    ]);

Route::get('add_wishlist/{slug}', 'Frontend\PerfilController@add_wishlist');
Route::get('remove_wishlist/{id}', 'Frontend\PerfilController@remove_wishlist');
Route::get('add_custom/{action}',[
    'as'   => 'add_custom',
    'uses' => 'Frontend\PerfilController@add_custom'
    ]);

Route::get('print/{action}',[
    'as'   => 'print',
    'uses' => 'Frontend\CartController@print_cart'
    ]);

// Login redes sociales
Route::get('auth/{social}', 'Frontend\SocialAuthController@redirectToProvider');
Route::get('auth/{social}/callback', 'Frontend\SocialAuthController@handleProviderCallback');
Route::post('mailchimp_register', 'Frontend\SocialAuthController@mailchimp_register');

// Login para Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');
});

Route::get('contacto/{slug}',[
    'as'   => 'contacto_producto',
    'uses' => 'Frontend\HomeController@contacto_producto'
    ]);
