<?php

namespace App\Http\Controllers;

use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function create()
    {
        $code = "USR-";
        $lastUser = MasterUser::where('id_user', 'like', "$code%")->latest('id_user')->first();
        $lastNo = (int) substr($lastUser->id_user ?? $code . '0000', 4, 4);
        $nextNo = $lastNo + 1;
        $id = $code . sprintf('%04s', $nextNo);

        // Fetch all users to display in the table
        $users = MasterUser::all(); // Assuming your model is MasterUser

        return view('admin.input_user', compact('id', 'users'));
    }


    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'jabatan' => 'required|string',
            'email' => 'required|email|unique:master_user,email',
        ]);

        // ID generation logic
        $code = "USR-";
        $lastUser = MasterUser::where('id_user', 'like', "$code%")->latest('id_user')->first();
        $lastNo = (int) substr($lastUser->id_user ?? $code . '0000', 4, 4);
        $nextNo = $lastNo + 1;
        $id = $code . sprintf('%04s', $nextNo); // Generate the new ID

        // Store the new user
        $user = new MasterUser();
        $user->id_user = $id; // Use the generated ID
        $user->nama_user = strtoupper($request->name);
        $user->description = strtoupper($request->jabatan);
        $user->email = $request->email;
        $user->password = Hash::make('kimiafarma'); // Assign default password
        $user->role = 'User';
        $user->photo = 'user.png';
        $user->status = '1';
        $user->integritas = '0';
        $user->save();

        Alert::success('Behasil', 'User Berhasil di tambahkan.');
        // Redirect with success message
        return redirect()->route('user.create');
    }


    public function edit($id)
    {
        $data_user = MasterUser::findOrFail($id);

        return view('admin.edit_user', compact('data_user'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'jabatan' => 'required|string',
            'email' => 'required|email|unique:master_user,email,' . $id . ',id_user',
        ]);

        $user = MasterUser::find($id);
        $user->nama_user = strtoupper($request->name);
        $user->description = strtoupper($request->jabatan);
        $user->email = $request->email;
        $user->status = '1';
        $user->save();

        Alert::success('Behasil', 'User Berhasil di update.');

        return redirect()->route('user.create', $id);
    }

    public function destroy($id)
    {
        $user = MasterUser::find($id);
        $user->delete();

        Alert::success('Behasil', 'User Behasil di hapus.');

        return redirect()->route('user.create');
    }

    public function resetPassword($id)
    {
        $user = MasterUser::find($id);
        $user->password = md5('kimiafarma');
        $user->save();

        Alert::success('Behasil', 'Password Berhasil di reset.');

        return redirect()->route('user.create');
    }

    protected function authenticated(Request $request, $user)
    {
        // Set session for successful login
        session()->flash('login_success', true);

        return redirect()->intended($this->redirectPath());
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        // Set session for failed login
        session()->flash('login_error', 'Invalid email or password.');

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => trans('auth.failed'),
            ]);
    }

}
