<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = []; // no guard => all faillable
    // protected $fillable = ['title', 'intro', 'body'];

    public function category()
    {
        // hasOne, hasMany, belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }
}
