<?php

namespace App\Http\Controllers;

use App\Models\Testify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TestifyController extends Controller
{
    // ... existing methods ...

    /**
     * Custom method to validate and save testimonial data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveTestimonial(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Error creating content');
        }

        // Create a new Testify instance and save the data
        $testify = new Testify();
        $testify->userid = Auth::user()->id;
        $testify->content = $request->content;
        $testify->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Testimonial saved successfully.');
    }
}
