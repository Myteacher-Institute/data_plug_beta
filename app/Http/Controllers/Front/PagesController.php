<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Settings;
// use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $settings = Settings::find(1);
        return view("index", ['settings' => $settings]); 
    }

    public function about()
    {
        return view('front.about');
    }

    public function how_it_works()
    {
        return view('front.how_it_work');
    }
    public function features()
    {
        return view('front.features');
    }
    public function test()
    {
        return view('front.test');
    }
}
