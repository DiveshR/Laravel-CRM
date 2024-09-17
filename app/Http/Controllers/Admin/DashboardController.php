<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::select('name','email','created_at')->where('role_id', Role::ROLE_USER)->get();
        $records = Record::get();
        return view('admin.dashboard', compact('users', 'records'));
    }
}
