<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NINController extends Controller
{
    public function nin_services(Request $request) {
        $value = $request->input('value');

        // Redirect to another blade file with the value
        return response()->json([
            'redirect_url' => route('display.value', ['value' => $value])
        ]);
    }

    public function display_value(Request $request)
    {
        $value = $request->query('value');
        return view('front.nin-services', compact('value'));
    }
}
