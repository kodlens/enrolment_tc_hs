<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseNote extends Model
{
    use HasFactory;

    protected $table = 'nurse_notes';
    protected $primaryKey = 'nurse_note_id';

    protected $fillable = [
        'patient_id',
        'doctor_order',
        'patient_admission_id',
        'date_time_created',
        'focus',
        'nurse_notes',
    ];

}
