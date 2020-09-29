<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Sluggable, SearchableTrait;
    protected $guarded = [];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function sluggable() {
    //     return [
    //         'slug' => [
    //             'source'         => 'title',
    //             'separator'      => '-',
    //             'includeTrashed' => true,
    //         ]
    //     ];
    // }

    protected $searchable = [
        'columns'   => [
            'posts.title'       => 10,
            'posts.description' => 10,
        ],
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function approved_comments()
    {
        return $this->hasMany(Comment::class)->whereStatus(1);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
}