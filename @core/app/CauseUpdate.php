<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauseUpdate extends Model
{
    protected $fillable = ['cause_id','title','description','image'];
    protected $table = 'cause_updates';

    public function cause(){
       return $this->belongsTo(Cause::class,'cause_id');
    }
}
