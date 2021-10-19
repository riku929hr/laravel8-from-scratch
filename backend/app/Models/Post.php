<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $date;
    public $excerpt;
    public $body;
    public $slug;

    public function __construct($title, $date, $excerpt, $body, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return collect(File::files(resource_path("posts")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(
                fn ($document) => new Post(
                    $document->title,
                    $document->date,
                    $document->excerpt,
                    $document->body(),
                    $document->slug
                )
            );
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
