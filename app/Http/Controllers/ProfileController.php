<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        if($request->password != '') {
            $validator = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'infix' => ['nullable', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'housenumber' => ['required', 'integer'],
                'postal_code' => ['required', 'string', 'max:10'],
                'city' => ['required', 'string', 'max:48'],
                'phone_number' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
                'password' =>['required', 'string', 'min:8']
            ]);

            $request->user()->update([
                'first_name' => $request->first_name,
                'infix' => $request->infix,
                'last_name' => $request->last_name,
                'street' => $request->street,
                'housenumber' => $request->housenumber,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $validator = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'infix' => ['nullable', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'housenumber' => ['required', 'integer'],
                'postal_code' => ['required', 'string', 'max:10'],
                'city' => ['required', 'string', 'max:48'],
                'phone_number' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
            ]);

            $request->user()->update([
                'first_name' => $request->first_name,
                'infix' => $request->infix,
                'last_name' => $request->last_name,
                'street' => $request->street,
                'housenumber' => $request->housenumber,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
            ]);
        }

        return Redirect::route('home');
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
