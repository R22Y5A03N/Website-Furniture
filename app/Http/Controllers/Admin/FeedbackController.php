<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->latest()->paginate(10);
        return view('feedbacks.feedback', compact('feedbacks'));
    }
    
    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', compact('feedback'));
    }
    
    public function respond(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|max:1000',
        ]);
        
        $feedback->update([
            'admin_response' => $validated['admin_response'],
            'is_responded' => true,
        ]);
        
        // Buat notifikasi untuk user
        Notification::create([
            'user_id' => $feedback->user_id,
            'type' => 'feedback_response',
            'message' => 'Admin telah merespons feedback Anda.',
            'is_read' => false,
        ]);
        
        return redirect()->route('admin.feedbacks.index')
            ->with('success', 'Feedback berhasil direspons');
    }
    
    // Method baru untuk edit
    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }
    
    // Method baru untuk update
    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|max:1000',
        ]);
        
        $feedback->update([
            'admin_response' => $validated['admin_response'],
        ]);
        
        // Buat notifikasi untuk user tentang update
        Notification::create([
            'user_id' => $feedback->user_id,
            'type' => 'feedback_response',
            'message' => 'Admin telah memperbarui respons terhadap feedback Anda.',
            'is_read' => false,
        ]);
        
        return redirect()->route('admin.feedbacks.show', $feedback)
            ->with('success', 'Respons feedback berhasil diperbarui');
    }
    
    // Method baru untuk delete
    public function destroy(Feedback $feedback)
    {
        // Hapus notifikasi terkait
        Notification::where('user_id', $feedback->user_id)
            ->where('type', 'feedback_response')
            ->where('message', 'like', '%feedback%')
            ->delete();
            
        $feedback->delete();
        
        return redirect()->route('admin.feedbacks.index')
            ->with('success', 'Feedback berhasil dihapus');
    }
}