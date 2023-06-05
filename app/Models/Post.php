<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tag;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function getPhotoPaths()
    {
        return explode(',', $this->photo);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getLatestPosts()
    {
        return self::latest()->take(10)->get();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags');
    }

    protected $fillable = [
        'title',
        'body',
        'file',
       
    ];
}
