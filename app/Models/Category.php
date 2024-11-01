<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function service()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
