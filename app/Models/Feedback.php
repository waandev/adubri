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
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
