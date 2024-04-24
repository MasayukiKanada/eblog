<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'header',
        'body',
        'for_user',
        'is_visible',
        'posted_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
