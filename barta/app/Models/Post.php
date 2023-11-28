<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Post->users Relationship
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Post->comment Relationship
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
