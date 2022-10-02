<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function add(){
        return view('backend.pages.addcategory');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'category_avater' => 'mimes:jpg,jpeg,png'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;

        if ($request->hasFile('category_avater')){
            $file = $request->category_avater;
            $ext = $file->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$ext;

            $path = public_path('backend/assets/img/category/');

            $image = Image::make($file);
            $image->resize(300,300, function($constraint){
//                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path.$fileName);

            $category->category_avater = $fileName;
        }

        $category->category_slug = $this->uniqueSlug($request->category_name);
        $category->save();

        return redirect()->route('category.add')->with('success', 'Category Added Successfully');
    }
    public function show(){
        $categories = Category::all();
        return view('backend.pages.managecategory', compact('categories'));
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('');
    }



    public function uniqueSlug($slg){
        $slug= Str::slug($slg);
        if (Category::where('category_slug', $slug)->exists()){
            $org = $slug;
            $count = 1;
            while (Category::where('category_slug', $slug)->exists()){
                $slug = "{$org}-".$count++;
            }
        }
        return $slug;
    }
}
