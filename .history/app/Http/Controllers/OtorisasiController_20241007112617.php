<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUser; // Assuming 'MasterUser' is your user model
use App\Models\DataDashboard;
use App\Models\DataOtorisasi;
use RealRashid\SweetAlert\Facades\Alert;

class OtorisasiController extends Controller
{
    public function create()
    {
        $users = MasterUser::select('id_user', 'nama_user')->orderBy('id_user', 'asc')->get();
        $dashboards = DataDashboard::select('id_dashboard', 'title')->orderBy('id_dashboard', 'asc')->get();

        $otorisasi = DataOtorisasi::with(['user', 'dashboard'])
            ->whereHas('user')
            ->whereHas('dashboard')
            ->get();

        return view('otorisasi.create', compact('users', 'dashboards', 'otorisasi'));
    }

    public function store(Request $request)
    {
        $userId = $request->input('user');
        $dashboards = $request->input('dashboard', []);

        // Delete existing authorizations for this user
        DataOtorisasi::where('id_user', $userId)->delete();

        // Insert new authorizations
        foreach ($dashboards as $dashboardId) {
            DataOtorisasi::create([
                'id_user' => $userId,
                'id_dashboard' => $dashboardId,
            ]);
        }

        Alert::success('Behasil', 'Add Authorization is success');

        return redirect()->route('otorisasi.create');
    }
}
