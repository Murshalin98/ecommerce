<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(){

        return view('backend.subcategory.subcategory', [
            'subcategories' => SubCategory::with('get_category')->orderBy('subcategory_name','asc')->paginate(),
            'categories' => Category::orderBy('category_name','asc')->get(),
            'scat_count' => SubCategory::count(),
        ]);
    }


    function SubCategoryPost(Request $request){

        $request->validate([
            'subcategory_name' => ['required', 'min:3', 'unique:sub_categories'],
            'category_id' => ['required']
        ]);

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->subcategory_name),
            'created_at' => Carbon::now()
        ]);

        return back()->with('insert', 'SubCategory Added Successfully');
    }

    function SubCategoryUpdate(Request $request){
        SubCategory::findOrFail($request->subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->subcategory_name),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/sub-category')->with('update', 'SubCategory has been Updated Succsessfully');
    }


    function SubCategoryDelete($id){

        SubCategory::where('id', $id)->delete();
        return back()->with('delete', 'SubCategory has been Deleted');
    }

    function SubCategoryEdit($id){
        $subcategories = SubCategory::paginate(10);
        $scats = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name','asc')->get();
        return view('backend.subcategory.subcategory_edit', compact('subcategories', 'scats', 'categories'));
    }

    public function SubCategoryAdd(){
        $categories = Category::orderBy('category_name','asc')->get();
        return view('backend.subcategory.subcategory_add', compact('categories'));
    }

    public function SubCategoryTrash(){
        $scat_trash = SubCategory::onlyTrashed()->paginate(10);
        return view('backend.subcategory.subcategory_trash', compact('scat_trash'));
    }

    function SubCategoryRestore($id){
        SubCategory::where('id', $id)->restore();
        return back()->with('restore', 'SubCategory Restored Successfully');
    }

    function SubCategoryDestroy($id){
        SubCategory::where('id', $id)->forceDelete();
        return back()->with('destroy', 'SubCategory has been Destroy');
    }

}
