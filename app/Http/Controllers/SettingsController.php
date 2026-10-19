<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(private readonly UserService $users) {}

    /**
     * Show the account settings page.
     */
    public function edit(Request $request): View
    {
        return view('settings.edit', ['user' => $request->user()]);
    }

    /**
     * Update the name, email and profile picture.
     */
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        $this->users->updateProfile(
            $request->user(),
            $request->safe()->only(['name', 'email']),
            $request->file('avatar'),
        );

        return redirect()->route('settings.edit')->with('status', 'Profile updated.');
    }

    /**
     * Remove the profile picture.
     */
    public function destroyAvatar(Request $request): RedirectResponse
    {
        $this->users->removeAvatar($request->user());

        return redirect()->route('settings.edit')->with('status', 'Profile picture removed.');
    }

    /**
     * Change the password.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->users->updatePassword($request->user(), $request->validated('password'));

        return redirect()->route('settings.edit')->with('status', 'Password updated.');
    }
}
