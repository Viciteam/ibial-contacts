<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStages extends Model
{
    public $table = 'crm_project_stages';

    protected $fillable = [
        'project_id',
        'stage_name'
    ];

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public function project_items()
    {
        return $this->hasMany(ProjectItems::class, 'project_stage_id');
    }

}
