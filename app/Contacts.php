<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $table = 'crm_contacts';

    protected $fillable = [
        'user_id',
        'contact_name',
        'contact_email',
        'contact_address',
        'work_phone',
        'mobile_phone',
        'home_phone',
        'job_title',
        'website',
        'business'
    ];
}
