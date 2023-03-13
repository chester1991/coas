<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicant_admission';

    protected $fillable = [
        'fname', 
        'lname', 
        'mname',
        'ext',
        'gender',
        'bday',
        'pbirth',
        'annual_income',
        'level',
        'hnum',
        'brgy',
        'mdc',
        'province',
        'region',
        'zcode',
        'lstsch_attended',
        'sch_yr',
        'type',
        'award',
        'preference_1',
        'preference_2',
        'preference_3',
        'd_admission'
    ];

    public function result()
    {
        return $this->hasOne('App\Models\ExamineeResult', 'admission_id','admission_id');
    }

    public function interview()
    {
        return $this->hasOne('App\Models\DeptRating', 'admission_id','admission_id');
    }
}