<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $datas = Category::latest()->paginate(5);
        // $datas = Category::find(4);
        // return $datas->subcategories;
        return view('admin.categories.index',[
            'datas' => $datas,
        ]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|unique:categories|between:3,30',
            'description' =>'nullable|min:3|max:30',
            'preview_img' => 'nullable|mimes:png,jpg',
        ]);

        $inputs = $request->only('title', 'description');



        try {
            if($request->hasFile('preview_img')){
                $image = $request->file('preview_img');
                $imageName = $image->hashName();
                $location = public_path('uploads/categories/image/'.$imageName);
                Image::make($image)->resize(280, 280)->save($location);
                $inputs['preview_img'] = $imageName;
            }
            Category::create($inputs);
            Session::flash('success', 'You are successfuly.');
            return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.categories.edit',[
            'data' => $data,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|between:3,30|unique:categories,id,'.$id,
            'description' =>'nullable|min:3|max:30',
            'preview_img' => 'nullable|mimes:png,jpg',
        ]);

        $inputs = $request->only('title', 'description');



        try {
            if($request->hasFile('preview_img')){
                $image = $request->file('preview_img');
                $imageName = $image->hashName();
                $location = public_path('uploads/categories/image/'.$imageName);
                Image::make($image)->resize(280, 280)->save($location);
                $inputs['preview_img'] = $imageName;
            }
            Category::findOrFail($id)->update($inputs);
            Session::flash('success', 'You are successfuly.');
            return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy($id)
    {
        //
    }
}
