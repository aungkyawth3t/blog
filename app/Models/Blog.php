<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Notifiable;
    
    protected $guarded = []; // no guard => all faillable
    protected $with = ['category', 'author'];

    public function scopeFilter($query, $filter) //Blog::latest()->filter();
    {
        $query->when($filter['search']??false, function ($query, $search){
            $query->where('title', 'LIKE', '%'.$search.'%')
                  ->orWhere('body', 'LIKE', '%'.$search.'%');
        });
        $query->when($filter['category']??false, function ($query, $slug){
            $query->whereHas('category', function ($query) use($slug) {
                $query->where('slug', $slug);
            });
        });
    }

    public function category()
    {
        // hasOne, hasMany, belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
