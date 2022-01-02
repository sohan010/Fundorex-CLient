<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalDocument extends Model
{
    use HasFactory;

    protected $table = 'medical_documents';
    protected $fillable = ['cause_id','documents'];

    public function cause(){
        return $this->belongsTo(Cause::class,'cause_id');
    }
}
