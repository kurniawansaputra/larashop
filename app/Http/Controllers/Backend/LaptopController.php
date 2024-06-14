<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all laptops ordered by the id in descending order
        $laptops = Laptop::orderBy('id', 'desc')->get();

        return view('pages.backend.laptop.index', compact('laptops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get all brands
        $brands = Brand::all();

        return view('pages.backend.laptop.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'processor' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'gpu' => 'required|string',
            'display' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'released_at' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/laptops', $imageName);
        }

        // create the laptop
        Laptop::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'gpu' => $request->gpu,
            'display' => $request->display,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'released_at' => $request->released_at,
            'image' => $imageName,
        ]);

        // redirect to the index page
        return redirect()->route('laptops.index')->with(['alert-type' => 'success', 'message' => 'Laptop created successfully!']);
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
        // get the laptop
        $laptop = Laptop::findOrFail($id);

        // get all brands
        $brands = Brand::all();

        return view('pages.backend.laptop.edit', compact('laptop', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate the request
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'processor' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'gpu' => 'required|string',
            'display' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'released_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // get the laptop
        $laptop = Laptop::findOrFail($id);

        // upload the image when it is available
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/laptops', $imageName);

            // delete the old image
            if ($laptop->image) {
                Storage::delete('public/laptops/' . $laptop->image);
            }
        }

        // if image is not available or null
        if (!isset($imageName)) {
            $imageName = $laptop->image;
        }

        // update the laptop
        $laptop->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'gpu' => $request->gpu,
            'display' => $request->display,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'released_at' => $request->released_at,
            'image' => $imageName,
        ]);

        // redirect to the index page
        return redirect()->route('laptops.index')->with(['alert-type' => 'success', 'message' => 'Laptop updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get the laptop
        $laptop = Laptop::findOrFail($id);

        // delete the image
        if ($laptop->image) {
            Storage::delete('public/laptops/' . $laptop->image);
        }

        // delete the laptop
        $laptop->delete();

        // redirect to the index page
        return redirect()->route('laptops.index')->with(['alert-type' => 'success', 'message' => 'Laptop deleted successfully!']);
    }
}
