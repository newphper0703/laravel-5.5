<?php
/*
    *name:UserController.php
    *author:liuzhi
    *createtime:2017 2017/9/7 11:45
    *description:  example
    
*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserController extends Controller{

    protected $users;

    public function __construct(UserRepository $users){

        $this->users = $users;
    }


    public function index(){
        return view('welcome');
    }
    public function show($id){

        $user = $this->users->find($id);
        return view('user.profile',['user'=>$user]);
    }
    public function showProfile($id){

        Log::info('........'.$id);
        $user = Cache::get('user:'.$id);
        return view('profile',['user'=>$user]);
    }

    public function store(Request $request){

        //$name = $request->name;
        $input = $request->all();
        $name = $request->input('name');
        $name = $request->input('name', 'Sally');
        $name = $request->input('products.0.name');
        $names = $request->input('products.*.name');

        $name = $request->query('name');
        $name = $request->query('name','Sally');
        $query = $request->query();

        //$uri = $request->path();
//        if ($request->is('admin/*')) {
//            //
//        }
//        $url = $request->url();
//        $url = $request->fullUrl();
//        $method = $request->method();
//        if($request->isMethod('post')){
//            //
//        }


    }

    public function update(Request $request, $id){

    }
    public function testBasicExample()
    {
        Cache::shouldReceive('get')
            ->with('key')
            ->andReturn('value');

        $this->visit('/cache')
            ->see('value');
    }
}
