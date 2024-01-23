<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoblog extends Model
{
    use HasFactory;
    protected $table = 'blogscocontent';

    protected $fillable = [
        'metadescription','metatitle' 
    ];
 
}
