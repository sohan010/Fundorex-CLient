<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStoryCategory extends Model
{
    use HasFactory;

    protected $table = 'success_story_categories';
    protected $fillable = ['name','status'];
}
