<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantDocs extends Model
{
    use HasFactory;

    protected $table = 'applicant_docs';

    protected $fillable = [
        'admission_id', 
        'r_card', 
        'g_moral',
        'b_cert',
        'h_dismissal',
        'm_cert',
    ];
}
