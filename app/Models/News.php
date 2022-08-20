<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    protected $fillable = [
        'source_id',
        'source_name',
        'title',
        'description',
        'content',
        'author',
        'url',
        'image_path',
        'published_at',
    ];

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
