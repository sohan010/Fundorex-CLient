<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaUpload extends Model
{
    protected $table = "media_uploads";
    protected $fillable = ['title','alt','size','path','dimensions','user_id'];
}
