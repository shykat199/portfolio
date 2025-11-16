<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = ['position','description','company_name','start_date','end_date','status','is_working'];
}
