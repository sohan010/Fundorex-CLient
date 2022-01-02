<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;
    protected $table = 'success_stories';
    protected $fillable = ['title','status','slug','meta_title','meta_description','meta_tags','excerpt','story_content','success_story_category_id','image','og_meta_title','og_meta_description','og_meta_image'];

    public function category(){
        return $this->belongsTo(SuccessStoryCategory::class,'success_story_category_id');
    }
}
