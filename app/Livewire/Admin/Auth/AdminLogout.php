<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AdminLogout extends Component
{

    public function logout()
    {
        Auth::guard('admin')->logout();

        session()->invalidate();

        session()->regenerateToken();

        return to_route('admin.login');
    }
    public function render()
    {
        return view('admin.auth.admin-logout');
    }
}
