<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = ['name', 'user_id']; // 一括代入が許可される
    use HasFactory;
    public function blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'articles_tags', 'tag_id', 'blog_id');
    }

    // リレーショナルデータベースの設定
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
