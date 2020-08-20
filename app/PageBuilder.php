<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageBuilder extends Model
{
    public $table = 'crm_landing_page';

    protected $fillable = [
        'user_id',
        'page_title',
        'page_link',
        'page_content'
    ];
}
