<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        
        // Tandai semua notifikasi sebagai telah dibaca
        Auth::user()->notifications()->update(['is_read' => true]);
        
        return view('notifikasi', compact('notifications'));
    }
    
    public function markAsRead(Notification $notification)
    {
        if ($notification->user_id !== Auth::id()) {
            abort(403);
        }
        
        $notification->update(['is_read' => true]);
        
        return redirect()->back();
    }
}