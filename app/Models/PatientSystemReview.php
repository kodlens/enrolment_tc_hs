<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSystemReview extends Model
{
    use HasFactory;

    protected $table = 'patient_system_reviews';
    protected $primaryKey = 'patient_system_review_id';

    protected $fillable = [
        'patient_id',
        'patient_admission_id',
        'general',
        'skin',
        'eent',
        'musculoskeletal',
        'respiratory',
        'cardiovascular',
        'gastrointestinal',
        'genitourinary',
        'female_reproductive',
        'nervous', 'past_disease',
        'history_cancer',
        'ptb', 'asthma', 'cancer',
        'musculoskeletal',
        'extremities',
        'neurological',
        'admitting_impression',
        'by_attending_physician',
        'diagnose_by_admitting_physician',
    ];

}
