<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function __invoke(): View
    {
        $name = auth()->user()?->name;

        return view('dashboard', [
            'greeting' => $this->greeting().($name ? ', '.Str::before($name, ' ') : ''),
        ]);
    }

    private function greeting(): string
    {
        return match (true) {
            now()->hour < 12 => 'Good morning',
            now()->hour < 17 => 'Good afternoon',
            default => 'Good evening',
        };
    }
}
