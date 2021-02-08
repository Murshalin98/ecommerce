<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use App\Models\Productss;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $title = 'Category List';
        $count = Category::count();
        $categories = Category::orderBy('category_name', 'asc')->paginate(10);
        $deleted_cat = Category::onlyTrashed()->paginate(5);
        return view('backend.category.category', compact('categories', 'deleted_cat', 'title', 'count'));
    }

    function CategoryAdd(){
        return view('backend.category.category_add');
    }

    function CategoryTrash(){
        $trashed_cat = Category::onlyTrashed()->paginate(10);
        return view('backend.category.category_trash', [
            'trashed_cat' => $trashed_cat,
            'tcount' => Category::onlyTrashed()->count()
        ]);
    }

    function CategoryPost(Request $request){

        $request->validate([
            'category_name' => ['required','min:3', 'unique:categories'],
            'slug' => ['required']
        ], [
            'category_name.required' => 'Category Name is Required',
            'slug.required' => 'Slug field is Required'

        ]);

        $cat = new Category;
        $cat->category_name = $request->category_name;
        $cat->slug = $request->slug;
        $cat->save();

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'slug' => $request->slug,
        //     'created_at' => Carbon::now('Asia/Dhaka'),
        // ]);

        return back()->with('insert','Category Added Successfully');

    }

    public function CategoryDelete($id)
    {
        $cat =  Category::findOrFail($id);
        $cat_product_count = Productss::where('category_id', $cat->id)->count();
        if ($cat_product_count > 0) {
            return back()->with('delete', 'You cann\'t Delete this Category.');
        }

        // SubCategory::where('category_id', $id)->get();
        // foreach($scats as $scat){
        //     $scat->delete();
        // }

        SubCategory::where('category_id', $id)->delete();
        Category::where('id',$id)->delete();

        return redirect('/category')->with('delete','Category Deleted Successfully With Sub Category');
    }

    public function CategoryEdit($id){

        return view('backend.category.category_edit', [
            'categories' => Category::paginate(5),
            'cats' => Category::findOrFail($id),
            // 'cats' => Category::where('slug', $id)->first(),
        ]);
    }

    public function CategoryUpdate(Request $request){

        // Category::findOrFail($request->category_id)->update([
        //     'category_name' => $request->category_name,
        //     'slug' => $request->slug,
        //     'updated_at' => Carbon::now()
        // ]);

        $cat = Category::findOrFail($request->category_id);
        $cat->category_name = $request->category_name;
        $cat->slug = $request->slug;
        $cat->save();

        return back()->with('update','Category Updated Successfully');
    }

    function CategoeyRestore($id){
        Category::where('id', $id)->restore();
        return back()->with('restore', 'Category Restored Successfully');
    }

    function CategoryDestroy($id){
        Category::where('id', $id)->forceDelete();
        return back()->with('destroy', 'Category has been Destroyed');
    }

    function CategoryEmpty(){
        Category::onlyTrashed()->forceDelete();
        return back()->with('empty', 'Trashed Categories has been Cleaned.');
    }

    function CategoryAllDelete(){
        // Category::truncate();
        // Category::query()->delete();
        $category = Category::get();
        foreach($category as $cat){
            $cat -> delete();
        }
        return back()->with('empty', 'All Categories has been Cleaned.');
    }

}
