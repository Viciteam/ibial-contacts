<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectItems extends Model
{
    public $table = 'crm_project_items';

    protected $fillable = [
        'project_id',
        'project_stage_id',
        'title',
        'attachments'
    ];

    public function project_stages()
    {
        return $this->belongsTo(ProjectStages::class);
    }
}
