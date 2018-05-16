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
|  可用的路由方法：
|   Route::get($uri, $callback);
|   Route::post($uri, $callback);
|   Route::put($uri, $callback);
|   Route::patch($uri, $callback);
|   Route::delete($uri, $callback);
|   Route::options($uri, $callback);
 获取当前路由信息
$route = Route::current();

$name = Route::currentRouteName();

$action = Route::currentRouteAction();
*/

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Auth::routes();

//get 方式
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cache', function () {
    return Cache::get('key');
});
Route::get('/user','UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::put('user/{id}','UserController@update');


Route::get('foo',function(){
    return 'Hello World!!!';
});
Route::get('foo/bar',function() {
    return [1,2,3];
});
Route::post('foo/bar',function(){
    return [1,2,3];
});
Route::put('foo/bar',function(){
    return [1,2,3];
});

//注册资源路由
Route::resource('photos','PhotoController');

Route::get('response', function(){
    return response('response test',200)->header('Content-Type','text/plain');
});
Route::get('dashboard', function () {
    return redirect('home/dashboard');
});
////必选路由参数
////在路由中定义参数,路由的参数通常都会被放在 {} 内，并且参数名只能为字母，同时路由参数不能包含 -，请用下划线 (_) 代替
//Route::get('user/{id}',function($id){
//    return 'User'.$id;
//});
////在路由中定义多个参数
//Route::get('posts/{post}/comments/{comment}',function($postId, $commentId){
//    //
//});
//
////可选路由参数,声明路由参数时，如需指定该参数为可选，可以在参数后面加上 ? 来实现，但是相应的变量必须有默认值
//Route::get('user/{name?}',function($name = null){
//    return $name;
//});
//Route::get('user/{name?}',function($name = 'John'){
//    return $name;
//});
//
//Route::get('user/{name}',function($name){
//    //
//})->where('name','[A-Za-z]+');
//Route::get('user/{id}',function($id){
//    //
//})->where('id','[0-9]+');
//Route::get('user/{id}/{name}',function($id,$name){
//    //
//})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//Route::get('user/profile',function(){
//    //
//})->name('profile');
//Route::get('user/profile','UserController@showProfile')->name('profile');

//Route::get('/',funcion(){
//    return 'Hello World';
//});



//Route::match(['get','post'],'/',function(){
//    //
//    return 'route.match';
//});
//中间件
Route::get('admin/profile', function () {
    //
})->middleware('auth','auth.basic');
use App\Http\Middleware\Checkage;

Route::get('admin/profile',function(){

})->middleware(Checkage::class);
//中间件组
//Route::get('/',function(){
//
//})->middleware('web');
//
//Route::group(['middleware'=>['web']],function(){
//
//});
//中间件参数
Route::get('post/{id}',function(){

})->middleware('role:editor');

Route::any('foo',function(){
    //
    return 'Hello World(any)';
});
Route::redirect('/here','/there',301);

//Route::view('/welcome','welcome');
Route::view('/welcome','welcome',['name'=>'Taylor']);

//给路由组中定义的所有路由分配中间件,使用 middleware 方法
//Route::middleware(['first','second'])->group(function(){
//    Route::get('/',function(){
//        //
//    });
//    Route::get('user/profile',function(){
//       //
//    });
//});

//命名空间
//Route::namespace('Admin')->group(function(){
//
//});

//子域名路由
//Route::domain('{account}.myapp.com')->group(function(){
//    Route::get('user/{id}',function($account,$id){
//
//    });
//});
////路由前缀
//Route::prefix('admin')->group(function(){
//    Route::get('users',function(){
//        // 匹配包含 "/admin/users" 的 URL
//    });
//});

//Route::get('api/users/{user}',function(App\User $user){
//    return $user->email;
//});
//Route::get('profile/{user}',function(App\User $user){
//    //
//});

//Route::get('user/{id}/profile',function($id){
//    //
//})->name('profile');
//$url = route('profile',['id'=>1]);
//
////生成路由
//$url = route('profile');
//
//return redirect()->route('profile');

Route::get('post/create', 'PostController@create');

Route::post('post', 'PostController@store');

Route::get('testViewHello',function(){
    return view('hello');
});

Route::get('testViewHome',function(){
    return view('home');
});




