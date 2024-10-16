<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePoint;


class ServicePointApiController extends Controller
{
    public function index()
    {
        $servicePoints = ServicePoint::all();
        return response()->json(['servicePoints' => $servicePoints]);
    }

    public function show($id)
    {
        $servicePoint = ServicePoint::findOrFail($id);
        return response()->json(['servicePoint' => $servicePoint]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'State' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'Location_Name' => 'required|string|max:255',
            'Contact_Person' => 'required|string|max:255',
            'Mobile_No1' => 'required|string|max:15',
            'Mobile_No2' => 'required|string|max:15',
            'Address_Pin_Code' => 'required|string|max:10',
            'Status' => 'required|string|max:255',
        ]);

        // Create a new service point record
        $servicePoint = new ServicePoint($validatedData);
        $servicePoint->save();

        return response()->json(['message' => 'Service Point created successfully']);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'State' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'Location_Name' => 'required|string|max:255',
            'Contact_Person' => 'required|string|max:255',
            'Mobile_No1' => 'required|string|max:15',
            'Mobile_No2' => 'required|string|max:15',
            'Address_Pin_Code' => 'required|string|max:10',
            'Status' => 'required|string|max:255',
        ]);

        // Find the service point record by ID
        $servicePoint = ServicePoint::findOrFail($id);

        // Update the service point record
        $servicePoint->update($validatedData);

        return response()->json(['message' => 'Service Point updated successfully']);
    }

    public function destroy($id)
    {
        // Find the service point record by ID and delete it
        $servicePoint = ServicePoint::findOrFail($id);
        $servicePoint->delete();

        return response()->json(['message' => 'Service Point deleted successfully']);
    }
}
