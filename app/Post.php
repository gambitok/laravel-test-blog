<?php

namespace App;

use App\Comment\CommentableInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $file
 * @property int $posts_category_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\PostsCategory $postsCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePostsCategoryId($value)
 * @mixin \Eloquent
 */
class Post extends Model implements CommentableInterface
{
    public $timestamps = false;
    protected $fillable = ['name', 'content', 'file', 'posts_category_id'];
    protected $attributes = [
        'file' => ''
    ];

    /**
     * Get related comments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'belong_to');
    }

    /**
     * Get posts category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postsCategory()
    {
        return $this->belongsTo(PostsCategory::class);
    }
}
