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

    public function scopeSortOrder ($query, $sortOrder)
    {
        if($sortOrder === null) {
            return $query->orderBy('posts.posted_at', 'desc') ;
         }
        if($sortOrder === \Constant::SORT_ORDER['later']){
            return $query->orderBy('posts.posted_at', 'desc') ;
        }
        if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('posts.posted_at', 'asc') ;
        }
    }

    public function scopeSearchKeyword($query, $keyword)
    {
        if(!is_null($keyword))
        {
            $spaceConvert = mb_convert_kana($keyword,'s');
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);
            foreach($keywords as $word)
            {
                $query->where('posts.body','like','%'.$word.'%');
            }
        } else {
            return;
        }
    }
}
