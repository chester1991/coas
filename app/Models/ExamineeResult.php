<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamineeResult extends Model
{
    use HasFactory;

    protected $table = 'examinee_result';

    protected $fillable = [
        'row_score', 'percentile', 'rating', 'interviewed_by','approval',
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'admission_id');
    }
}
