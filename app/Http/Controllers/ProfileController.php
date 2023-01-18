<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
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
        if ($request['remove-avatar']) {
            $request->user()->avatar_url = null;

        } else if ($request['language']) {
            $request->user()->language = $request['language'];
        } else if ($request['bible']) {
            $request->user()->bible_id = $request['bible'];
        } else {
            $attributes = $request->validate([
                'name' => ['required'],
                'email' => ['required', Rule::unique('users', 'email')->ignore($request->user())],
                'title' => ['string', 'nullable'],
                'avatar_url' => ['image'],
                'bio' => ['string', 'nullable']
            ]);

            $request->user()->fill($attributes);

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            if ($request->avatar_url ?? null) {
                $request->user()->avatar_url = request()->file('avatar_url')->store('avatar');
            }
        }

        $request->user()->save();
        return Redirect::route('profile.edit')->with('success', 'Profile Updated Successful');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
