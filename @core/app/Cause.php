<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\DonationCategory;

class Cause extends Model
{
    protected $table = 'causes';
    protected $fillable = ['cause_update_id','title','cause_content','amount','raised','status','slug','image','meta_title','image_gallery','meta_tags','meta_description','user_id','admin_id','deadline','faq','created_by','featured','categories_id','excerpt','og_meta_title','og_meta_description','og_meta_image','medical_document','emmergency'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function category(){
        return $this->belongsTo(CauseCategory::class,'categories_id');
    }
    public function cause_update(){
        return $this->belongsTo(CauseUpdate::class,'cause_update_id');
    }

    public function cause_updates_data(){
        return $this->hasMany(CauseUpdate::class,'cause_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'cause_id','id');
    }

    public function donors(){
        return $this->hasMany(Cause::class);
    }

    public function withdraws(){
        return $this->hasMany(DonationWithdraw::class,'donation_id');
    }

}
