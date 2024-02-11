<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subject', 'content'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\tags', 'articles_tags');
    }
}
