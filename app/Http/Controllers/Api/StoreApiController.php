<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreApiController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return response()->json(['stores' => $stores]);
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);
        return response()->json(['store' => $store]);
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

        return response()->json(['message' => 'Store created successfully']);
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

        return response()->json(['message' => 'Store updated successfully']);
    }

    public function destroy($id)
    {
        // Find the store record by ID and delete it
        $store = Store::findOrFail($id);
        $store->delete();

        return response()->json(['message' => 'Store deleted successfully']);
    }
}
