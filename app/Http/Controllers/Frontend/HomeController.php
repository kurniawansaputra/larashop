<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get all laptops
        $laptops = Laptop::all();

        return view('pages.frontend.home.index', compact('laptops'));
    }

    public function search(Request $request)
    {
        $laptops = Laptop::where('name', 'like', '%' . $request->name . '%')->get();

        return view('pages.frontend.home.index', compact('laptops'));
    }
}
