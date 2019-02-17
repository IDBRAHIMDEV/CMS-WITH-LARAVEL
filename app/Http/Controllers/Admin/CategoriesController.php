<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    public function index() {

        $categories = Category::all();
        return view('admin.categories.index')
                  ->with('categories', $categories);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|min:3'
        ]);

      
        $category = new Category;
        $category->name = $request->name;

        $category->save();
        
        Session::flash('success', 'This category is created successfully ');
        return redirect()->route('category.index');
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id) {
        
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'This category is updated successfully ');

        return redirect()->route('category.index');
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();

        Session::flash('warning', 'This category is deleted successfully ');

        return redirect()->route('category.index');
    }
}
