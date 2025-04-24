<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalExperience extends Model
{
    protected $fillable = ['position','description','college_name','start_date','end_date','status'];
}
