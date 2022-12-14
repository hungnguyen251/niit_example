<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Get all the users.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function index()
    {
        $users = DB::table('users')->get();

        // return $users;
        return view('users.show', ['users' => $users]);
    }

    /**
     * Store a user.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //Handle password
        try {
            if (!empty($request->password)) {
                $request->merge(['password' => md5($request->password)]);
            }
    
            DB::table('users')->insert($request->except(['_token','_method','submit']));
    
            return redirect()->route('users.index')->with('success', 'Thêm người dùng thành công');
            
        } catch(Exception $e) {
            
            return redirect()->route('users.index')->with('failed', 'Thêm người dùng thất bại'); 
        }

    }

    /**
     * Get a user.
     *
     * @param  int  $id
     *
     */
    public function show(int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return $user;
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function update(Request $request, int $id)
    {
        try {
            DB::table('users')->where('id', $id)->update($request->except(['_token','_method','submit']));

            return redirect()->route('users.index')->with('success', 'Cập nhật người dùng thành công'); 

        } catch(Exception $e) {

            return redirect()->route('users.index')->with('failed', 'Cập nhật người dùng thất bại'); 
        }
    }

    /**
     * Delete a user.
     *
     * @param  int  $id

     */
    public function destroy(int $id)
    {
        try {
            DB::table('users')->where('id', $id)->delete();

            return redirect()->route('users.index')->with('success', 'Xóa người dùng thành công');

        } catch(Exception $e) {

            return redirect()->route('users.index')->with('failed', 'Xóa người dùng thất bại');
        }
    }

     /**
     * Edit a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Create a user.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('users.create');
    }
}
