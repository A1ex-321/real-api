<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = [
        'id','Tittle', 'Description', 'Image'
    ];
    public function contentblogs()
    {
        return $this->hasMany(Contentblog::class, 'blog_id');
    }
}
