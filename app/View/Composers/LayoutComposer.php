<?php

namespace App\View\Composers;

use App\Support\Initials;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LayoutComposer
{
    /**
     * Share the navigation and signed-in user details with the layout.
     */
    public function compose(View $view): void
    {
        $user = auth()->user();
        $name = $user?->name ?? 'Guest';

        $view->with([
            'navigation' => config('navigation'),
            'currentUser' => [
                'name' => $name,
                'firstName' => Str::before($name, ' '),
                'initials' => Initials::from($name),
                'email' => $user?->email,
                'avatar' => $user?->avatar_url,
                'role' => $user ? 'Administrator' : 'Not signed in',
            ],
            'notifications' => [],
        ]);
    }
}
