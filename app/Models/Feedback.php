<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'feedbacks';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'complaint_id',
        'user_id',
        'feedback',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
