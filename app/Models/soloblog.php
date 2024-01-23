<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soloblog extends Model
{
    use HasFactory;
    protected $table = 'soloblog';

    protected $fillable = [
        'metadescription','metatitle' 
    ];
 
}