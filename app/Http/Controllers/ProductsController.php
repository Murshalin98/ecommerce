<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Color;
use App\Models\Faq;
use App\Models\Products_Attribute;
use App\Models\ProductsImage;
use App\Models\Productss;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class ProductsController extends Controller
{
    public function products_list()
    {
        $products = Productss::orderBy('title', 'asc')->paginate(10);

        return view('backend.products.product_list', [
            'products' => $products,
            'countP' => Productss::count(),
        ]);
    }


    public function products_add()
    {
        $category = Category::orderBy('category_name', 'asc')->get();
        $subcategory = SubCategory::all();
        $colors = Color::all();

        return view('backend.products.product_add', compact('category', 'subcategory', 'colors'));
    }


    public function products_addPost(Request $request)
    {
        // return $request->color_id;
        // return $request->quantity;

        $request->validate([
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'title' => ['required'],
            'summary' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'thumbnail' => ['image'],
            // 'quantity' => ['required']
        ]);

        $check_slug = Productss::where('slug', Str::slug($request->title))->count();
        if ($check_slug > 0) {
            $slug = Str::slug($request->title).'-'.time();
        } else {
            $slug = Str::slug($request->title);
        }

        if ($request->hasFile('thumbnail')) {
            $upload_img = $request->file('thumbnail');
            $ImgNameExt = Str::slug($request->title).'.'.$upload_img->getClientOriginalExtension();
            Image::make($upload_img)->resize(300, 300)->save(public_path('products/thumbnail/'.$ImgNameExt));
        }
        else{
            $ImgNameExt = 'no-image.png';
        }

        $product_id = Productss::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $ImgNameExt,
            // 'quantity' => 5,
            'created_at' => Carbon::now(),
        ]);

        foreach ($request->color_id as $key => $color) {
            Products_Attribute::insert([
                'product_id' => $product_id,
                'color_id' => $color,
                'size_id' => $request->size_id[$key],
                'quantity' => $request->quantity[$key],
            ]);
        }

        $images_path = public_path('products/images/'. $product_id);
        File::makeDirectory($images_path, $mode = 0777, true, true);

        // Multiple images insert Code

        if ($request->hasFile('images')) {
            $upload_images = $request->file('images');

            foreach($upload_images as $images){
                $upimgext = 'images_'. Str::random(5) .'.'. $images->getclientoriginalextension();
                Image::make($images)->resize(300, 300)->save($images_path .'/'. $upimgext);

                ProductsImage::insert([
                    'product_id' => $product_id,
                    'images' => $upimgext,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        return back()->with('insert', 'Product added Successfully');
    }


    public function products_delete($id)
    {
        $product = Productss::findOrFail($id);

        $path = (public_path('products/thumbnail/'. $product->thumbnail));
        if ($product->thumbnail != 'no-image.png') {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $images = ProductsImage::where('product_id', $product->id)->get();
        foreach ($images as $key => $image) {
            $image->delete();

            $image_path = public_path('products/images/'. $product->id .'/'. $image->images);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        File::deleteDirectory(public_path('products/images/'. $product->id));

        $product->delete();

        return redirect('/products/list')->with('delete', 'Product Deleted Successfully');
    }


    public function products_trash()
    {
        return view('backend.products/product_trash', [
            'Ptrash' => Productss::onlyTrashed()->paginate(5),
            'countPT' => Productss::onlyTrashed()->count(),
        ]);
    }


    public function products_restore($id)
    {
        Productss::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('restore', 'Product restored Successfully');
    }


    public function products_destroy($id)
    {
        Productss::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('destroy', 'Product delete Permanently');
    }


    public function sub_category_ajax_list($id)
    {
        $scat = SubCategory::where('category_id', $id)->get();
        return response()->json($scat);
    }


    // public function product_details($slug)
    // {
    //     $products = Productss::with('product_images')->where('slug', $slug)->first();

    //     $colors = Products_Attribute::where('product_id', $products->id)->get();
    //     $collection = collect($colors);
    //     $grouped = $collection->groupBy('color_id');

    //     $details = About::get()->first();
    //     $faqs = Faq::all();
    //     return view('frontend.products.single', compact('products', 'details', 'faqs', 'grouped'));
    // }


    public function single_picture_delete($id)
    {
        $images = ProductsImage::findOrFail($id);
        $path = public_path('products/images/'. $images->product_id .'/'. $images->images);

        if (file_exists($path)) {
            unlink($path);
        }

        $images->delete();

        return back()->with('delete', 'A image has been Deleted');
    }


    public function products_edit($id)
    {
        $products = Productss::findOrFail($id);
        $category = Category::orderBy('category_name', 'asc')->get();
        $colors = Color::orderBy('color_name', 'asc')->get();
        $subcategory = SubCategory::orderBy('subcategory_name', 'asc')->get();
        return view('backend.products.product_edit', compact('products', 'category', 'colors', 'subcategory'));
    }


    public function products_update(Request $request)
    {
        $id = $request->pro_id;
        $product = Productss::findOrFail($id);

        $check_slug = Productss::where('slug', Str::slug($request->title))->count();
        if ($check_slug > 0) {
            $slug = Str::slug($request->title) .'-'. time();
        }
        else{
            $slug = Str::slug($request->title);
        }

        $path = (public_path('products/thumbnail/'. $product->thumbnail));
        if (file_exists($path)) {
            unlink($path);
        }
        if ($request->hasFile('thumbnail')) {
            $uploaded = $request->file('thumbnail');
            $extension = $slug .'.'. $uploaded->getclientoriginalextension();
            Image::make($uploaded)->resize(300, 300)->save(public_path('products/thumbnail/'. $extension));
        }
        else{
            $extension = 'no-thumbnail.png';
        }

        $product->update([
            'title' => $request->title,
            'slug' => $slug,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'summary' => $request->summary,
            'thumbnail' => $extension,
            'description'  => $request->description
        ]);

        foreach ($request->attribute_id as $key => $aid) {
            Products_Attribute::findOrFail($aid)->update([
                'product_id' => $id,
                'color_id' => $request->color_id[$key],
                'size_id' => $request->size_id[$key]
            ]);
        }

        if ($request->hasFile('images')) {
            $uploadImgs = $request->file('images');

            foreach ($uploadImgs as $key => $picture) {
                $PicName = $id . time() .'.'. $picture->getclientoriginalextension();
                Image::make($picture)->resize(300, 300)->save(public_path('products/images/'. $product->id .'/'. $PicName));

                ProductsImage::insert([
                    'product_id' => $product->id,
                    'images' => $PicName,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        return redirect(route('ProductsList'));
    }


    // function GetSize($id, $id2)
    // {
    //     $stringToSend = '';
    //     $sizes = Products_Attribute::where('product_id', $id2)->where('color_id', $id)->get();
    //     foreach ($sizes as $size) {
    //         $stringToSend = $stringToSend.'<input type="radio" name="size" value="'.$size->id.'"> '.$size->get_size->size.'';
    //     }
    //     echo $stringToSend;
    // }

}
