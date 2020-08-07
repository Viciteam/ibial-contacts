<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    public $table = 'crm_deals';

    protected $fillable = [
        'stage_id',
        'contact_id',
        'deal'
    ];

    public function dealstages()
    {
        return $this->belongsTo(DealStages::class);
    }
}
