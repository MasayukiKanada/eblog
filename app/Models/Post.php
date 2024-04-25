<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'header',
        'body',
        'thumnail',
        'for_user',
        'is_visible',
        'posted_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
