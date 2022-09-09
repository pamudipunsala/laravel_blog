<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];

        if($request->hasfile('image')){
            $file = $request->file('image'); 
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
            
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        // $category->navbar_status = $data->navbar_status == true ? '1':'0';
        // $category->status = $data->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('message', 'Details added successfully');        
    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id){
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];

        if($request->hasfile('image')){
            $file = $request->file('image'); 
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
            
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        // $category->navbar_status = $data->navbar_status == true ? '1':'0';
        // $category->status = $data->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('message', 'Details updated successfully!');
    }

    public function destroy($category_id){
        $category = Category::find($category_id);

        if($category){
            // $dest = 'uploads/category/'.$category->image;

            // if(File::exists($dest)){
            //     File::delete($dest);
            // }

            $category->delete();
            return redirect('admin/category')->with('message', 'Details deleted successfully!');
        }
        else{
            return redirect('admin/category')->with('message', 'Couldn\'t find the id of the category');
        }
    }
}