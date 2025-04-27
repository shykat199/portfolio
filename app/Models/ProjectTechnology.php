<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    protected $fillable = ['project_id','skill_id','percentage'];

    public function skill()
    {
        return $this->belongsTo(Skill::class,'skill_id','id');
    }
}
