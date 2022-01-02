<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralMenu extends Model
{
    use HasFactory;

    protected $table = 'general_menus';
    protected $fillable = ['title','status','custom_url'];
}
