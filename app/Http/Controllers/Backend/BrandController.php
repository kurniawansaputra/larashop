<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all brands ordered by the id in descending order
        $brands = Brand::orderBy('id', 'desc')->get();

        return view('pages.backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => ['required'],
        ]);

        // Create the brand
        Brand::create([
            'name' => $request->name,
        ]);

        // Redirect to the brands index
        return redirect()->route('brands.index')->with(['alert-type' => 'success', 'message' => 'Brand created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the brand
        $brand = Brand::findOrFail($id);

        return view('pages.backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $request->validate([
            'name' => ['required'],
        ]);

        // Update the brand
        Brand::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        // Redirect to the brands index
        return redirect()->route('brands.index')->with(['alert-type' => 'success', 'message' => 'Brand updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the brand
        Brand::findOrFail($id)->delete();

        // Redirect to the brands index
        return redirect()->route('brands.index')->with(['alert-type' => 'success', 'message' => 'Brand successfully deleted!']);
    }
}
