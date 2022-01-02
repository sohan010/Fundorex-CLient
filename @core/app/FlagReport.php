<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlagReport extends Model
{
    use HasFactory;

    protected $table = 'flag_reports';
    protected $fillable = ['cause_id','name','email','subject','description'];

    public function cause(){
        return $this->belongsTo(Cause::class,'cause_id');
    }
}
