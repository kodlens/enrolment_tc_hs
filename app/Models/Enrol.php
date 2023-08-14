<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrol extends Model
{
    use HasFactory;

    protected $table = 'enrols';
    protected $primaryKey = 'enrol_id';


    protected $fillable = [
        'academic_year_id',
        'grade_level',
        'is_returnee',
        'learner_id',
        'section_id',
        'semester_id',
        'track_id',
        'strand_id',
        'date_enroled',
        'section_id',
        'section'
    ];

}
