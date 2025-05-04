<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil statistik untuk dashboard
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $latestProducts = Product::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalUsers',
            'latestProducts',
            'latestUsers'
        ));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function loginHistory()
    {
        // Mengambil riwayat login dari tabel sessions
        $loginHistory = DB::table('sessions')
            ->join('users', 'sessions.user_id', '=', 'users.id')
            ->select('users.name', 'sessions.ip_address', 'sessions.last_activity')
            ->orderBy('sessions.last_activity', 'desc')
            ->paginate(15);

        return view('admin.login-history', compact('loginHistory'));
    }
}