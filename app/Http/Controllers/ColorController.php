<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(10);
        return view('backend.colors.colors', compact('colors'));
    }

    public function add_post(Request $request)
    {
        // $insert = new Color;
        // $insert->color_name = $request->color_name;

        $request->validate([
            'color_name' => ['required', 'unique:colors']
        ]);

        Color::insert([
            'color_name' => $request->color_name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('insert', 'Color added successfully for Products');
    }

    public function color_update(Request $request)
    {
        $request->validate([
            'color_name' => ['required', 'unique:colors']
        ]);

        $update = Color::findOrFail($request->color_id);
        $update->color_name = $request->color_name;
        $update->save();

        return back()->with('update', 'Color name has been Updated');
    }

    public function color_delete($id)
    {
        Color::findOrFail($id)->delete();
        return back()->with('delete', 'Color deleted Successfully');
    }
}
