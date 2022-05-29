<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class Post extends Model
{
    use HasFactory,HasSlug;
    protected $fillable = ['title','description', 'content','category_id','thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('thumbnail'))
        {
            if($image)
            {
                Storage::delete($image);
            }
            return $request->file('thumbnail')->store("images");
        }
        return null;    
    }
    public function getImage()
    {
        if(!$this->thumbnail)
        {
            return asset('uploads/default.png');
        }
        return asset("uploads/{$this->thumbnail}");
    }
    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }
}