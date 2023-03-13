<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptRating extends Model
{
    use HasFactory;

    protected $table = 'applicant_dept_rating';

    protected $fillable = [
        'admission_id', 
        'rating', 
        'remarks',
        'course',
    ];

}
