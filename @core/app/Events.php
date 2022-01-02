<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $fillable = ['title','status','date','image','time','cost','available_tickets','organizer','organizer_email','organizer_phone','slug','organizer_website','venue','venue_location','venue_phone','content','category_id','meta_description','meta_tags','meta_title'];

    public function category(){
        return $this->hasOne('App\EventsCategory','id','category_id');
    }
}
