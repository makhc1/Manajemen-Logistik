<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function master()
    {
        return view('pages.master');
    }

    public function inbound()
    {
        $inbounds = \App\Models\Inbound::orderBy('created_at', 'desc')->get();
        return view('pages.inbound', compact('inbounds'));
    }

    public function outbound()
    {
        return view('pages.outbound');
    }

    public function warehouses()
    {
        return view('pages.warehouses');
    }

    public function security()
    {
        return view('pages.security');
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function users()
    {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('pages.users', compact('users'));
    }
}
