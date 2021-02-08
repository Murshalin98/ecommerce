<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Products_Attribute;
use App\Models\Productss;

class FrontendController extends Controller
{
    public function front()
    {
        $products = Productss::orderBy('id', 'desc')->get();
        $details = About::get()->first();
        return view('frontend.frontend', compact('products', 'details'));
    }

    public function product_details($slug)
    {
        $products = Productss::with('product_images')->where('slug', $slug)->first();

        $colors = Products_Attribute::where('product_id', $products->id)->get();
        $collection = collect($colors);
        $grouped = $collection->groupBy('color_id');

        $details = About::get()->first();
        $faqs = Faq::all();
        return view('frontend.products.single', compact('products', 'details', 'faqs', 'grouped'));
    }

    function GetSize($id, $id2)
    {
        $stringToSend = '';
        $sizes = Products_Attribute::where('product_id', $id2)->where('color_id', $id)->get();
        foreach ($sizes as $size) {
            $stringToSend = $stringToSend.'<input type="radio" name="size" value="'.$size->id.'"> '.$size->get_size->size.'';
        }
        echo $stringToSend;
    }

    public function shop()
    {
        $categorise = Category::orderBy('category_name', 'desc')->get();
        $products = Productss::orderBy('id', 'desc')->get();
        return view('frontend.shopping.shop', compact('products', 'categorise'));
    }

    public function all_article()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog.index', compact('blogs'));
    }

    public function single_article($slug)
    {
        $categories = BlogCategory::all();
        $recent_posts = Blog::latest()->limit(4)->get();
        $blog = Blog::where('slug', $slug)->first();
        return view('frontend.blog.single', compact('blog', 'categories', 'recent_posts'));
    }
}
