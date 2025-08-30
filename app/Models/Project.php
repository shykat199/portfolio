<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','slug','img','status','description','repo_url','live_url','rank'];

    public function technology()
    {
        return $this->hasMany(ProjectTechnology::class,'project_id','id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class,'project_id','id');
    }

}
