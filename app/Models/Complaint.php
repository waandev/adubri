<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'complaints';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'category_id',
        'service_id',
        'name',
        'email',
        'date_of_incident',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
