<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'blogpost_title',
        'blogpost_body',
        'blog_id',
    ];
    protected $primaryKey = 'blogpost_id';
}
