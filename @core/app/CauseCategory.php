<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauseCategory extends Model
{
    protected $table = 'cause_categories';
    protected $fillable = ['title','description','image','status'];

    public function donation(){
        return $this->hasMany(Cause::class,'categories_id','id');
    }
}
