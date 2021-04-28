<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','description','content','image','category_id','published_at','user_id'];

    protected $dates = [
        'published_at',  
    ];
 

    /**
     * Deletes the image from storage
     * 
     * return void
     */

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Checks if this post has tag id
     * 
     * return boolean
     */

    public function hasTag($id)
    {
        return in_array($id, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scoping the published posts
     */
    public function scopePublished($query)
    {
        return $query->where('published_at','<=',now());
    }

    /**
     * Query scoping if, the request has search
     * 
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if ($search) {
            return $query->published()->where('title','LIKE',"%{$search}%");
        }else{
            return $query->published();
        }
    }
}
