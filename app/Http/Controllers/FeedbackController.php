<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $feedback = Feedback::create([
            'user_id' => Auth::id(),
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas feedback Anda. Kami akan merespons secepatnya.');
    }
    
    public function index()
    {
        $feedbacks = Auth::user()->feedbacks()->latest()->get();
        return view('feedbacks.index', compact('feedbacks'));
    }
}