<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content"
    ];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The comments that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->user_id === auth()->user()->id || auth()->user()->isAdmin() 
        ?   $this->morphMany(Comment::class, 'commentable')
                    ->whereNull('parent_id') 
        :   $this->morphMany(Comment::class, 'commentable')
                    ->whereNull('parent_id')
                    ->where('status', 1);
    }

    /**
     * Check if user is the owner of the post
     * 
     * @return bool
     */

    public function isOwner(): bool
    {
        return $this->user_id === auth()->user()->id;
    }
}
