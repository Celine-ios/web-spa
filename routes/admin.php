<?php

Route::get('/', 'Backend\HomeController@index');

Route::group(['middleware' => ['admin']], function ()
    {
    Route::get('/home', 'Backend\HomeController@index');
    Route::resource('permission', 'Backend\Admin\PermissionController');
    Route::resource('role', 'Backend\Admin\RoleController');
    Route::resource('user', 'Backend\Admin\AdministratorController');
    Route::resource('client', 'Backend\Admin\ClientController');
    Route::resource('invitations', 'Backend\General\InvitationsController');
    Route::resource('pagos', 'Backend\General\PagosController');
    Route::resource('menu', 'Backend\General\MenuController');
    Route::resource('btype', 'Backend\General\BannerTypeController');
    Route::resource('banner', 'Backend\General\BannerController');
    Route::resource('wallpaper', 'Backend\General\WallpaperController');
    Route::resource('dtype', 'Backend\General\DocumentCategoryController');
    Route::resource('document', 'Backend\General\DocumentController');
    Route::resource('article_category', 'Backend\Article\ArticleTypeController');
    Route::resource('article', 'Backend\Article\ArticleController');
    Route::resource('brand', 'Backend\Product\BrandController');
    Route::resource('product_category', 'Backend\Product\ProductCategoryController');
    Route::resource('product_subcategory', 'Backend\Product\ProductSubcategoryController');
    Route::resource('product_filter', 'Backend\Product\ProductFilterController');
    Route::resource('product', 'Backend\Product\ProductController');
    Route::resource('discount', 'Backend\Product\DiscountController');
    Route::resource('order', 'Backend\Product\OrderController');
    Route::resource('pc_build', 'Backend\Product\BuildController');
    Route::resource('category_caracteristic','Backend\Product\CaracteristicController');

    Route::post('updatesubcategory/{id}','Backend\Product\ProductSubcategoryController@update');

    Route::post('updatebanner','Backend\General\BannerController@updateURL');


    Route::post('cloneproducts','Backend\Product\ProductController@clonar');
    Route::post('deleteproducts','Backend\Product\ProductController@eliminar');

    Route::get('/profile',[
        'as' => 'profile',
        'uses' => 'Backend\Admin\AdministratorController@profile'
    ]);

    Route::put('/profile',[
        'as' => 'profile',
        'uses' => 'Backend\Admin\AdministratorController@profile_update'
    ]);

    Route::post('search_product', 'Backend\Product\ProductController@search_product');
    Route::get('inactive_product', 'Backend\Product\ProductController@inactive_product');
    Route::get('product/{id}/star', 'Backend\Product\ProductController@star');
    Route::post('filtro_producto','Backend\Product\ProductController@filterProduct');
    Route::post('subcategories','Backend\Product\ProductController@subcategories');
    Route::get('product/{id}/images',[
        'as' => 'product.images',
        'uses' => 'Backend\Product\ProductController@images'
    ]);

    Route::post('reorder','Backend\Product\ProductController@reorder');

    Route::get('product/{id}/video',[
        'as' => 'product.video',
        'uses' => 'Backend\Product\ProductController@video'
    ]);

    Route::get('product/{id}/fields',[
        'as' => 'product.fields',
        'uses' => 'Backend\Product\ProductController@fields'
    ]);

    Route::post('product/{id}/fields',[
        'as' => 'product.fields',
        'uses' => 'Backend\Product\ProductController@check_fields'
    ]);

    Route::delete('product/{id}/fields_destroy',[
        'as' => 'additional.destroy',
        'uses' => 'Backend\Product\ProductController@fields_destroy'
    ]);

    Route::get('product/deactivate/{id}',[
        'as' => 'product.deactivate',
        'uses' => 'Backend\Product\ProductController@deactivate'
    ]);

    Route::post('product/quick',[
        'as' => 'product.quick',
        'uses' => 'Backend\Product\ProductController@quick_update'
    ]);

    Route::post('filter/quick',[
        'as' => 'filter.quick',
        'uses' => 'Backend\Product\ProductFilterController@filterupdate'
    ]);

    Route::post('brand/quick',[
        'as' => 'brand.quick',
        'uses' => 'Backend\Product\BrandController@brandupdate'
    ]);

    Route::post('product/{id}/images',[
        'as' => 'product.images',
        'uses' => 'Backend\Product\ProductController@images'
    ]);

    Route::post('product/{id}/video',[
        'as' => 'product.video',
        'uses' => 'Backend\Product\ProductController@video'
    ]);

    Route::put('/product/{id}/upload_images',[
        'as' => 'product.upload_images',
        'uses' => 'Backend\Product\ProductController@upload_images'
    ]);

    Route::post('/product/{id}/upload_videos',[
        'as' => 'product.upload_videos',
        'uses' => 'Backend\Product\ProductController@upload_videos'
    ]);

    Route::delete('/product/{id}/delete_image',[
        'as' => 'product.delete_image',
        'uses' => 'Backend\Product\ProductController@delete_image'
    ]);

    Route::delete('/product/{id}/delete_video',[
        'as' => 'product.delete_video',
        'uses' => 'Backend\Product\ProductController@delete_video'
    ]);

    Route::post('/product/upload',[
        'as' => 'product.upload',
        'uses' => 'Backend\Product\ProductController@upload'
    ]);

    Route::get('/order/{id}/approve',[
        'as' => 'order.approve',
        'uses' => 'Backend\Product\OrderController@approve'
    ]);

    Route::get('/order/{id}/test',[
        'as' => 'order.test',
        'uses' => 'Backend\Product\OrderController@test'
    ]);

    Route::get('/order/{id}/reject',[
        'as' => 'order.reject',
        'uses' => 'Backend\Product\OrderController@reject'
    ]);

    Route::get('/order/{id}/send',[
        'as' => 'order.send',
        'uses' => 'Backend\Product\OrderController@send'
    ]);

    Route::get('/order/{id}/guide',[
        'as' => 'order.guide',
        'uses' => 'Backend\Product\OrderController@guide'
    ]);

    Route::post('order/quick',[
        'as' => 'order.quick',
        'uses' => 'Backend\Product\OrderController@quick_update'
    ]);

    Route::post('build/quick',[
        'as' => 'build.quick',
        'uses' => 'Backend\Product\BuildController@quick_update'
    ]);

    Route::get('/client_view/{id}',[
        'as' => 'client.view',
        'uses' => 'Backend\Admin\ClientController@quick_view'
    ]);
});
