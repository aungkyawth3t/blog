<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Blog
{
    public $title, $slug, $intro, $body, $date;

    public function __construct($title, $slug, $intro, $body, $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
        $this->date = $date;
    }

    public static function all()
    {
        $files = File::files(\resource_path("blogs"));
        // collection 
        return collect($files)->map(function ($file) {
            $obj = YamlFrontMatter::parseFile($file);
            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body(), $obj->date);
        })
        ->sortByDesc('date');
        // return array_map( function ($file) {
        //     $obj = YamlFrontMatter::parseFile($file);
        //     return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        // }, $files);
    }
    
    public static function find($slug)
    {
        $blogs = static::all();
        return $blogs->firstWhere('slug', $slug);
    }
}