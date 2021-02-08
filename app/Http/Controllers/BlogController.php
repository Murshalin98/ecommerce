<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = BlogCategory::all();
        return view('backend.blog.create', compact('blogCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $upload_img = $request->file('thumbnail');
            $ImgNameExt = Str::slug($request->title).'.'.$upload_img->getClientOriginalExtension();

            $images_path = public_path('blogs/thumbnail/');
            File::makeDirectory($images_path, $mode = 0777, true, true);

            Image::make($upload_img)->save($images_path.$ImgNameExt);
        }
        if ($request->hasFile('images')) {
            $upload_img = $request->file('images');
            $ImgNameExt2 = Str::slug($request->title).'.'.$upload_img->getClientOriginalExtension();

            $images_path = public_path('blogs/images/');
            File::makeDirectory($images_path, $mode = 0777, true, true);

            Image::make($upload_img)->save($images_path.$ImgNameExt2);
        }

        $blog = new Blog;
        $blog->user_id = Auth::id();
        $blog->category_id = $request->blog_category;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->slug = Str::slug($request->title);
        $blog->thumbnail = $ImgNameExt ?? 'no-image.png';
        $blog->featured_image = $ImgNameExt2 ?? 'no-image.png';
        $blog->save();

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
