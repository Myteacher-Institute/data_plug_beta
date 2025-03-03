<?php

namespace App\Http\Controllers;

use App\Models\Testify;
use Illuminate\Http\Request;

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
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        if ($request->falls()){
            // Redirect back with an error message
            // return redirect()->back()->with('error', 'Failed to submit testimonial. Please try again.');
            return response()->json([
                'error' => 'Failed to submit testimonial. Please try again.',
            ]);
        }

        // Create a new Testify instance and save the data
        $testify = new Testify();
        $testify->content = $request->content;
        $testify->save();

        // Redirect back with a success message
        // return redirect()->back()->with('success', 'Testimonial saved successfully.');
        return response()->json([
            'success' => 'Data submitted successfully!',
            'content' => Testify::all(),
            'redirect_url' => url('testify')
        ]); 
    }
}
