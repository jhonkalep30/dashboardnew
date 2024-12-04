<?php

namespace App\Http\Controllers;

use App\Models\DataOtorisasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Process the data (e.g., send an email, save to the database, etc.)
        // Example: flash a success message and redirect back
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function dashboard()
    {
        // Logic for displaying dashboard
        return view('admin.dashboard');
    }

    public function otorisasi()
    {
        // Fetching otorisasi data to display
        $otorisasi = DataOtorisasi::with(['user', 'dashboard'])->get();

        // Return a view with the otorisasi data
        return view('admin.otorisasi', compact('otorisasi'));
    }
}
