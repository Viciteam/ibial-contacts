<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealStages extends Model
{
    public $table = 'crm_deal_stages';

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function deals()
    {
        return $this->hasMany(Deals::class, 'stage_id');
    }

}
