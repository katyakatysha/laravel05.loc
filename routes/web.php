<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MyController;
use App\Models\Category;

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
Route::get('/catalog', CatalogController::class);
Route::get('catalog/{category_id}/{product_id}', [CatalogController::class, 'product'])->name('site.product');
Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('/test', function (Request $request) {

    $data = $request->all();
    return response()->json($data)->setStatusCode(401);

});

Route::get('/store', [SiteController::class, 'store']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('admin')->group(callback: function () {

    Route::get('/', [MyController::class, 'index'])->name('')->withoutMiddleware('auth');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'articles' => ArticleController::class,
    ]);

//    Route::get('/weather', function (\Illuminate\Http\Request $request){
//        $query = [
//            'key' => env('WEATHER_API_KEY'),
//            'q' => 'Minsk',
//            'dt'=>'1989-08-31'
//        ];
//
//
//        $client = Http::baseUrl('http://api.weatherapi.com/v1');
//        $response = $client->get('/current.json', $query);
//        $result = $response['current']['temp_c']. 'C'.' '.$response['location']['region'];
//        $query['dt'];
//        dd($result);
//        //return view('weather', compact('response'));

//    Route::get('/test', function (\Illuminate\Http\Request $request){
//        $query = [
//          'lang' => 'ru',
//            'type'=>'json'
//
//        ];
//
//        $response = Http::get('https://evilinsult.com/generate_insult.php?lang=ru&type=json', $query);
//        dd($response->json());
//
//    });


    Route::get('/mail', function (\Illuminate\Http\Request $request){

        $mail = new \App\Mail\FirstMail('Hello mail');
        \Illuminate\Support\Facades\Mail::send();
    });





//        $client = new \GuzzleHttp\Client();
//        $response = $client->get('https://www.nbrb.by/api/exrates/rates/145?ondate=2016-7-1&periodicity=1', [
//            'headers' => []
//        ]);
//        $response = Http::get('https://www.nbrb.by/api/exrates/rates/145?ondate=2016-7-1&periodicity=1');
//
////        dd($response->getBody()->getContents(), true);
//        dd($response->getBody()->getContents(), true);
//    })


//    clientError - проверка группы кодов 400
//    serverError - проверка группы серверов 400
//    accept передает то, что мы хотим увидеть?



//Route::get('/', function () {
//
////    dd((Storage:: size('pppppp.php')));
////    dd( \Illuminate\Support\Facades\Storage::temporaryUrl('pppppp.php', ''));
////    return \Illuminate\Support\Facades\Storage::download('1.txt', 'jdfjkdf');
//
////    $category = \App\Models\Category::all();
////    dump($category);
//
//    return view('welcome');
//})->middleware(\App\Http\Middleware\MyMiddleware::class);
//
//Route::get('/any_file', function (){
//    return \Illuminate\Support\Facades\Storage::download('pppppp.php');
//});


//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::middleware('auth')->prefix('admin')->group(function () {
//
//
//    Route::get('/', [App\Http\Controllers\Admin\MyController::class, 'index']);
//    Route::resource('categories', CategoryController::class)->except(['show']);  //except удаление метода
//    Route::resources([
//        'categories' => CategoryController::class,
//        'products' => ProductController::class,
//        'articles' => ArticleController::class
//    ]);

//Route::get('/categories',[CategoryController::class, 'index'])
//    ->name('categories.index');
//Route::get('/categories/create',[CategoryController::class, 'create'])
//    ->name('categories.create');
//Route::post('/categories/create',[CategoryController::class, 'store'])
//    ->name('categories.store');
//Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])
//    ->name('categories.edit');
//Route::put('/categories/{category}/update',[CategoryController::class, 'update'])
//    ->name('categories.update');
//Route::delete('/categories/{category}/delete',[CategoryController::class, 'delete'])
//    ->name('categories.delete');


});
