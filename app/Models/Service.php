<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'services';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'category_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
