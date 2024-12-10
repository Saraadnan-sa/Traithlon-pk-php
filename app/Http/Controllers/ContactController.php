<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'nullable|string',
        ]);

        // Insert data into the database
        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message, // Store the message
            'created_at' => now(),          // Optional, handled by timestamps
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your contact information has been submitted successfully!');
    }
}
