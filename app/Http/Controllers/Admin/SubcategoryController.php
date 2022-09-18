<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SubcategoryController extends Controller
{
       public function index()
    {
        $datas = Subcategory::with('categories:id,title')->latest()->paginate(5);
        return view('admin.subcategories.index',[
            'datas' => $datas,
        ]);
    }


    public function create()
    {
        $categories = Category::where('is_active', 1)->get();

        return view('admin.subcategories.create', [
            'categories' => $categories,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|between:3,30',
            'category_id' =>'required',
            'description' =>'nullable|min:3|max:30',
            'preview_img' => 'nullable|mimes:png,jpg',
        ]);

        if (Subcategory::where('category_id', $request->category_id)->where('title', $request->title)->exists()) {
            return back()->with('error', 'This subcategory already exists')->withInput();
        }

        $inputs = $request->only('title', 'description', 'category_id');



        try {
            if($request->hasFile('preview_img')){
                $image = $request->file('preview_img');
                $imageName = $image->hashName();
                $location = public_path('uploads/subcategories/image/'.$imageName);
                Image::make($image)->resize(280, 280)->save($location);
                $inputs['preview_img'] = $imageName;
            }
            Subcategory::create($inputs);
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
        $data = Subcategory::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();
        return view('admin.subcategories.edit',[
            'data' => $data,
            'categories' => $categories,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|between:3,30',
            'category_id' =>'required',
            'description' =>'nullable|min:3|max:30',
            'preview_img' => 'nullable|mimes:png,jpg',
        ]);

        if (Subcategory::where('category_id', $request->category_id)->where('title', $request->title)->where('id', '!=', $id)->exists()) {
            return back()->with('error', 'This subcategory already exists');
        }

        $inputs = $request->only('title', 'description','category_id');



        try {
            if($request->hasFile('preview_img')){
                $image = $request->file('preview_img');
                $imageName = $image->hashName();
                $location = public_path('uploads/subcategories/image/'.$imageName);
                Image::make($image)->resize(280, 280)->save($location);
                $inputs['preview_img'] = $imageName;
            }
            Subcategory::findOrFail($id)->update($inputs);
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
