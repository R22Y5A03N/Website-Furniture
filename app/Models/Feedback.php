<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks'; // Tambahkan baris ini
    protected $fillable = [
        'user_id',
        'message',
        'admin_response',
        'is_read',
        'is_responded'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}