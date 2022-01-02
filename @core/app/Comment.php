<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['cause_id','user_id','commented_by','comment_content'];
    protected $table = 'comments';

    public function cause(){
        return $this->belongsTo(Cause::class,);
    }

    public function user(){
        return $this->belongsTo(User::class,);
    }
}
