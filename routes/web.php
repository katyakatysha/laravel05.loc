<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Test\ConverterController;
use App\Http\Controllers\Test\ConverterPostController;
use App\Models\Category;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', SiteController::class);
Route::get('/store', StoreController::class);
Route::get('/store/{category}/{product}', ProductPageController::class)->name('store.product');


Route::get('/cart', [CartController::class, 'getCart']);
Route::get('/add_to_cart', [CartController::class, 'addToCart']);
Route::get('/test', function (\Illuminate\Http\Request $request){

//    $client = new \GuzzleHttp\Client();
//    $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates/145?ondate=2016-7-1&periodicity=1');
    $d = 111;
   dd($d);
});
Route::get('/test2', function (\Illuminate\Http\Request $request){
    App::setLocale('ru');

    dd(__('welcome.welcome_text', ['name' => 'Amigo']));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [MyController::class, 'index']);
//    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'articles' => ArticleController::class,
    ]);
});
Route::get('/test/converter', ConverterController::class);
Route::post('/test/converter', ConverterPostController::class);

Route::get('/test', function(\Illuminate\Http\Request $request){
//    $job = new \App\Jobs\FirstJob('2mkk3rmk');
//    $job->dispatch('2mkk3rmk');
//    \App\Jobs\FirstJob::dispatch('myEmails')->onQueue('myEmails');
//


});

Route::post('/test', function(\Illuminate\Http\Request $request){
    $query = [
        'default' => 'Unrealistic_number_bro',
    ];
    $response = Http::get('http://numbersapi.com/'.$request->input('number'), $query);
    dd($response->body());
});


Route::post('/test', function(\Illuminate\Http\Request $request){
   \Illuminate\Support\Facades\Redis::get('ololo');

});

