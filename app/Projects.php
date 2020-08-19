<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $table = 'crm_projects';

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function project_stages()
    {
        return $this->hasMany(ProjectStages::class, 'project_id');
    }


}
