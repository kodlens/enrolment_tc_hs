<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExam extends Model
{
    use HasFactory;

    protected $table = 'patient_physical_exams';
    protected $primaryKey = 'patient_physical_exam_id';

    protected $fillable = [
        'patient_id',
        'patient_admission_id',
        'skin',
        'head_eent',
        'lymp_notes',
        'chest',
        'lungs',
        'cardiovascular',
        'breast',
        'abdomen',
        'rectum',
        'genitalia',
    ];
}
