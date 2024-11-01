<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date|before:'. Carbon::now()->subYears(20)->toDateString(),
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string|digits_between:10,15',
        ], [
        'birthdate.before' => 'You must be at least 20 years old.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birthdate = $request->input('birthdate');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->profile_verified_at = now();
        $user->phone_number = $request->input('phone_number');
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }


    public function verify(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to verify your profile.');
        }

        // Check if the profile is already verified
        if ($user->profile_verified_at !== null) {
            return redirect()->route('profile.edit')->with('success', 'Profile is already verified.');
        }

        // Simulate the verification process
        $user->profile_verified_at = now(); // Mark the user as verified
        $user->save();

        // Redirect to the profile edit page with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile verified successfully!');
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}