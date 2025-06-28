<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Notifiable;
    
    protected $guarded = []; // no guard => all faillable
    public function category()
    {
        // hasOne, hasMany, belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }
}
