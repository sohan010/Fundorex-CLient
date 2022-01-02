<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketDepartment extends Model
{
    use HasFactory;

    protected $table = 'support_ticket_departments';
    protected $fillable = ['name' ,'status'];
}
