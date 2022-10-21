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
    |
    */

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Route::resource("products","productcontroller");

    Route::get('product/trashedproducts','productcontroller@trashedproducts')->name('trashed');
    //Route::get('products.trashedproducts','productcontroller@trashedproducts')->name('trashed');

    Route::get("products/soft_delete/{id}","productcontroller@softDelete")->name('softdelete');
    
    Route::get("products/restore.product/{id}","productcontroller@restore_product")->name('restore.product');

    Route::get("products/deletforever.product/{id}","productcontroller@delete_for_ever")->name('deletforever.product');


?>