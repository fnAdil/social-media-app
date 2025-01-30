<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    public function show(User $user): View
    {
        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user): View
    {
        $this->authorize('edit', $user->profile);
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(User $user)
    {
        
        $this->authorize('update', $user->profile);   
        $data = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:profiles,username,' . $user->profile->id],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['url', 'nullable'],
            'image' => ['image', 'nullable'],
        ]);     

        if (request('image')) {
            //TO DO: make image square
            $imagePath = request('image')->store('profile', 'public');
            $data['image'] = $imagePath;
        }

        $user->profile->update($data);

  

        return Redirect::route('profile.edit', ['user' => $user])->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->authorize('destroy', $request->user()->profile);
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