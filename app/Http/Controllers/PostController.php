<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Get all the posts.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function index()
    {
        $posts = DB::table('posts')->get();

        //Handle category name
        if (count($posts) > 0) {

            for ($i = 0; $i < count($posts); $i++) {
                $categoryName = DB::table('categories')->select('name')->where('id', $posts[$i]->id)->first();
                $posts[$i]->category_id = $categoryName;
            }
        }

        // return $posts;
        return view('posts.show', compact('posts'));
    }

    /**
     * Store a post.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //Handle password
        try {
            DB::table('posts')->insert($request->except(['_token','_method','submit']));
    
            return redirect()->route('posts.index')->with('success', 'Thêm bài đăng thành công');
            
        } catch(Exception $e) {
            
            return redirect()->route('posts.index')->with('failed', 'Thêm bài đăng thất bại'); 
        }

    }

    /**
     * Get a post.
     *
     * @param  int  $id
     *
     */
    public function show(int $id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        return $post;
    }

    /**
     * Update a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function update(Request $request, int $id)
    {
        try {
            DB::table('posts')->where('id', $id)->update($request->except(['_token','_method','submit']));

            return redirect()->route('posts.index')->with('success', 'Cập nhật bài đăng thành công'); 

        } catch(Exception $e) {

            return redirect()->route('posts.index')->with('failed', 'Cập nhật bài đăng thất bại'); 
        }
    }

    /**
     * Delete a post.
     *
     * @param  int  $id

     */
    public function destroy(int $id)
    {
        try {
            DB::table('posts')->where('id', $id)->delete();

            return redirect()->route('posts.index')->with('success', 'Xóa bài đăng thành công');

        } catch(Exception $e) {

            return redirect()->route('posts.index')->with('failed', 'Xóa bài đăng thất bại');
        }
    }

     /**
     * Edit a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        return view('posts.edit', compact('post'));
    }

    /**
     * Create a post.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('posts.create');
    }
}
