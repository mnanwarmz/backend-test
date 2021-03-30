<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'post_id',
        'post_title',
        'post_body',
        'total_number_of_comments'
    ];
}
