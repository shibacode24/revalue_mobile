<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoresController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', ['stores' => $stores]);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'store_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
        ]);

        // Create a new store record
        $store = new Store($validatedData);
        $store->save();

        return redirect()->route('stores.index')->with('success', 'Store created successfully');
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit', ['store' => $store]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'store_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
        ]);

        // Find the store record by ID
        $store = Store::findOrFail($id);

        // Update the store record
        $store->update($validatedData);

        return redirect()->route('stores.index')->with('success', 'Store updated successfully');
    }

    public function destroy($id)
    {
        // Find the store record by ID and delete it
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully');
    }
}
