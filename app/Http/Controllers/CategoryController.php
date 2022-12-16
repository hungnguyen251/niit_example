<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Controller constructor.
     *
     * @param  \App\Model\Category  $categories
     */
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get all the categories.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function index()
    {
        $categories = $this->categories->all();

        // return $categories;
        return view('categories.show', compact('categories'));
    }

    /**
     * Store a category.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //Handle password
        try {
            $this->categories->insert($request->except(['_token','_method','submit']));
    
            return redirect()->route('categories.index')->with('success', 'Thêm thể loại thành công');
            
        } catch(Exception $e) {
            
            return redirect()->route('categories.index')->with('failed', 'Thêm thể loại thất bại'); 
        }

    }

    /**
     * Get a category.
     *
     * @param  int  $id
     *
     */
    public function show(int $id)
    {
        $category = $this->categories->where('id', $id)->first();

        return $category;
    }

    /**
     * Update a category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function update(Request $request, int $id)
    {
        try {
            $this->categories->where('id', $id)->update($request->except(['_token','_method','submit']));

            return redirect()->route('categories.index')->with('success', 'Cập nhật thể loại thành công'); 

        } catch(Exception $e) {

            return redirect()->route('categories.index')->with('failed', 'Cập nhật thể loại thất bại'); 
        }
    }

    /**
     * Delete a category.
     *
     * @param  int  $id

     */
    public function destroy(int $id)
    {
        try {
            $this->categories->where('id', $id)->delete();

            return redirect()->route('categories.index')->with('success', 'Xóa thể loại thành công');

        } catch(Exception $e) {

            return redirect()->route('categories.index')->with('failed', 'Xóa thể loại thất bại');
        }
    }

     /**
     * Edit a category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $category = $this->categories->where('id', $id)->first();
        $parentId = $this->categories->select('parent_id')->distinct()->get();

        return view('categories.edit', compact(['category', 'parentId']));
    }

    /**
     * Create a category.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        $parentId = $this->categories->select('parent_id')->distinct()->get();
        return view('categories.create', compact('parentId'));
    }
}
