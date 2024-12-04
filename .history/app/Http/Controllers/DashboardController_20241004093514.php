<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    // Shows the main dashboard page (index)
    public function index()
    {
//        dd(auth()->user()->otorisasi);
        $filterByUser = auth()->user()->otorisasi->map(function ($f) { return $f->id_dashboard; });
//        dd($filterByUser);
        if(auth()->user()->role == 'Admin') {
            $dashboards = DataDashboard::all(); // Fetch all dashboard records
        } else {
            $dashboards = DataDashboard::whereIn('id_dashboard', $filterByUser)->get(); // Fetch all dashboard records
        }

        if (Auth::user()->integritas == '0') {
            // If integritas is 0, show the integrity form
            return view('dashboard.integrity'); // You can create a separate view for the integrity form
        }

        return view('dashboard.index', compact('dashboards'));
    }

    public function saveIntegrity(Request $request)
    {
        $user = Auth::user();

        // Update the user's integritas to 1
        DB::table('master_user')
            ->where('id_user', $user->id_user)
            ->update(['integritas' => '1']);

        Alert::success('Success', 'Pakta integritas berhasil disimpan');

        // Flash success message and redirect to the dashboard
        return redirect()->route('dashboard');
    }


    // View a specific dashboard
    public function view($id)
    {
        $dashboard = DataDashboard::findOrFail($id); // Fetch dashboard by ID
        return view('dashboard.view', compact('dashboard'));
    }

    // Edit a specific dashboard
    public function edit($id)
    {
        $dashboard = DataDashboard::findOrFail($id); // Fetch dashboard by ID
        return view('dashboard.edit', compact('dashboard'));
    }

    // Delete a specific dashboard
    public function delete($id)
    {
        $dashboard = DataDashboard::findOrFail($id);
        $dashboard->delete(); // Delete dashboard

        Alert::success('Success', 'Dashboard deleted successfully.');

        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {
        $dashboard = DataDashboard::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
            'deskripsi' => 'required|string|max:80',
            'last_update' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dashboard->title = $request->input('title');
        $dashboard->link = $request->input('link');
        $dashboard->deskripsi = $request->input('deskripsi');
        $dashboard->last_update = $request->input('last_update');

        if ($request->hasFile('photo')) {
            // Handle file upload
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/icon'), $fileName);

            // Delete old file if necessary
            if (file_exists(public_path('image/icon/' . $dashboard->image))) {
                unlink(public_path('image/icon/' . $dashboard->image));
            }

            $dashboard->image = $fileName;
        }

        $dashboard->save(); // Save the updated dashboard to the database

        Alert::success('Success', 'Dashboard updated successfully');

        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
            'deskripsi' => 'required|string|max:80',
            'last_update' => 'required|date',
            'year' => 'required|digits:4',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate ID (e.g., DB000001)
        $prefix = "DB";
        $lastDashboard = DataDashboard::where('id_dashboard', 'like', "$prefix%")->latest('id_dashboard')->first();
        $lastNo = (int) substr($lastDashboard->id_dashboard ?? $prefix . '000000', 2);
        $nextNo = $lastNo + 1;
        $id_dashboard = $prefix . sprintf('%06d', $nextNo); // e.g., DB000001

        // Handle file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/icon'), $fileName);
        }

        // Create the dashboard entry
        DataDashboard::create([
            'id_dashboard' => $id_dashboard, // Set the custom alphanumeric ID
            'title' => $request->title,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
            'last_update' => $request->last_update,
            'year' => $request->year,
            'image' => $fileName, // Save the image file name here
            'status' => '1',
        ]);

        Alert::success('Success', 'Dashboard created successfully.');

        return redirect()->route('dashboard');
    }

}
