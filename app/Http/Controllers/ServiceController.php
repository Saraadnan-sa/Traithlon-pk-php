<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServiceController extends Controller
{
    use AuthorizesRequests;

    // Display a listing of the services
    public function index()
    {
        $services = Service::all(); // Retrieve all services from the database
        return view('services.index', compact('services')); // Return the view with services
    }

    // Show the form to create a new service
    public function create()
    {
        // Only allow admins to access this page
        $this->authorize('admin-only');
        return view('services.create'); // Return the create service view
    }

    // Store a newly created service in the database
    public function store(Request $request)
    {
        // Only allow admins to store a service
        $this->authorize('admin-only');

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Create the service using validated data
        Service::create($validated);

        // Redirect to services index with a success message
        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }

    // Show the form to edit the specified service
    public function edit(Service $service)
    {
        return view('services.edit', compact('service')); // Return the edit view with the service data
    }

    // Update the specified service in the database
    public function update(Request $request, Service $service)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Update the service with validated data
        $service->update($validated);

        // Redirect to services index with a success message
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    // Delete the specified service from the database
    public function destroy(Service $service)
    {
        // Only allow admins to delete a service
        $this->authorize('admin-only');

        // Delete the service
        $service->delete();

        // Redirect to services index with a success message
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
