<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 显示创建博客文章的表单。
     *
     * @return Response
     */
    public function create()
    {
        echo 2121;
        return view('post.create');
    }

    /**
     * 保存一个新的博客文章。
     *
     * @param  Request  $request
     * @return Response
     */
//    public function store(Request $request)
//    {
//        // 验证以及保存博客文章...
//        $this->validate($request, [
//            'title' => 'bail|required|unique:posts|max:255',
//            'body' => 'required',
//            'author.name' => 'required',
//            'author.description' => 'required',
//            'publish_at' => 'nullable|date'
//        ]);
//
//    }

//    public function store(StoreBlogPost $request) {
//
//    }


    /**
     * 保存一篇新的博客文章。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

        // 保存文章
    }





}