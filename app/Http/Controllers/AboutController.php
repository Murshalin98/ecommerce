<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_details()
    {
        $details = About::all();
        return view('backend.about.details', compact('details'));
    }

    public function about_details_post(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'about' => ['required']
        ]);

        $limit = About::count();
        if ($limit > 0) {
            return back()->with('limit', 'About details already Exists');
        }

        $insert_about = new About;
        $insert_about->phone = $request->phone;
        $insert_about->email = $request->email;
        $insert_about->address = $request->address;
        $insert_about->about = $request->about;
        $insert_about->save();

        return back()->with('insert', 'About added Successfully');
    }

    public function about_details_update(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'about' => ['required']
        ]);

        $update_about = About::findOrFail($request->about_id);
        $update_about->phone = $request->phone;
        $update_about->email = $request->email;
        $update_about->address = $request->address;
        $update_about->about = $request->about;
        $update_about->save();

        return back()->with('insert', 'About Updateded Successfully');
    }

    public function about_details_delete($email)
    {
        // $lmt = About::count();
        // if($lmt > 0) {
        //     return back()->with('limit', 'You can\'t Delete last One');
        // }

        About::where('email', $email)->delete();
        return back()->with('delete', 'Current about details has been Deleted');
    }
}
