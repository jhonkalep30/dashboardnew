<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the related master_user info
        $masterUser = $user->masterUser;

        // Pass both to the view
        return view('admin.profile', compact('user', 'masterUser'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Update user details
        $user = $request->user();
        $user->fill($request->validated());

        // Check if email is being updated
        if ($user->isDirty('email')) {
            $user->email_verified_at = null; // Reset email verification date if email changes
        }

        // Save changes
        try {
            $user->save();
            return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return Redirect::route('profile.edit')->withErrors(['error' => 'Unable to update profile.']);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate password before account deletion
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout the user before deletion
        Auth::logout();

        // Delete user account
        try {
            $user->delete();

            // Invalidate session and regenerate token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/')->with('status', 'Account deleted successfully.');
        } catch (\Exception $e) {
            return Redirect::route('profile.edit')->withErrors(['error' => 'Unable to delete account.']);
        }
    }
}
