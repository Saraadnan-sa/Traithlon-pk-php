<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class ServiceController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $this->authorize('admin-only');
        return view('services.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin-only');

        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $this->authorize('admin-only');
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
