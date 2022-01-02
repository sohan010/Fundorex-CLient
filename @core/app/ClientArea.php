<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientArea extends Model
{
    use HasFactory;

    protected $table = 'client_areas';
    protected $fillable = ['title','url','image'];
}
