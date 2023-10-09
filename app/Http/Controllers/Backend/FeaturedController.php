<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function index(){
        return view('backend.featured.index', ['features' => Feature::all()]);
    }

    public function create(){
        return view('backend.featured.create', ['categories' => Category::all()]);
    }

    public function store(Request $request){
        $featured = new Feature();

        $featured->title = $request->title;
        $featured->category_id = $request->category_id;
        $featured->date = $request->date;
        $image = $request->image;

        if($image){
            $path = 'assets/featured-images/';
            $imageName = time().rand().'.'.$image->extension();

            $image->move($path, $imageName);
            $featured->image = $path.$imageName;
        }

        $featured->save();

        return back()->with('message', 'Featured Added Successfully');
    }

    public function edit(int $id){
        return view('backend.featured.edit', ['features' => Feature::find($id), 'categories' => Category::all()]);
    }

    public function update(Request $request, int $id){
        $featured = Feature::find($id);

        $featured->title = $request->title;
        $featured->category_id = $request->category_id;
        $featured->date = $request->date;
        $image = $featured->image;

        if($image){
            if(file_exists($image)){
                unlink($image);
            }
        }

        $featured->save();

        return redirect('/manage/featured')->with('message', 'Featured Updated Successfully');
    }

    public function destroy(int $id){
        $featured = Feature::find($id);
        $image = $featured->image;

        if($image){
            if(file_exists($image)){
                unlink($image);
            }
        }

        $featured->delete();

        return back()->with('message', 'Featured Deleted Successfully');
    }
}
