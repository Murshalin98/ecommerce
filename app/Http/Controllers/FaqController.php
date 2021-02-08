<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function genarel_faq()
    {
        return view('backend.faq.general', [
            'details' => Faq::paginate(10)
        ]);
    }


    public function genarel_faq_post(Request $request)
    {
        Faq::insert([
            'question' => $request->question,
            'answear' => $request->answear,
            'created_at' => Carbon::now()
        ]);

        return back()->with('insert', 'A Genarel FAQ added Successfully');
    }


    public function genarel_faq_update(Request $request)
    {
        $updateFaq = Faq::findOrFail($request->faq_id);
        $updateFaq->question = $request->question;
        $updateFaq->answear = $request->answear;
        $updateFaq->save();

        return back()->with('update', 'Genarel FAQ has been Updated');
    }


    public function genarel_faq_delete($id)
    {
        Faq::findOrFail($id)->delete();
        return back()->with('delete', 'A Genarel FAQ has been Deleted');
    }
}
