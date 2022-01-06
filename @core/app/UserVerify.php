<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    protected $table = 'user_verifies';
    protected $fillable = ['user_id','name','date_of_birth','family_card_photo','selfie_photo','selfie_with_family_card_photo'];
}
