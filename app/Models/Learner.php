<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    use HasFactory;


    protected $table = 'learners';
    protected $primaryKey = 'learner_id';

    protected $fillable = [
        'lrn',
        'lname',
        'fname',
        'mname',
        'extension',
        'sex',
        'birthdate',
        'birthplace',
        'mother_tongue',
        'is_indigenous',
        'specify_indigenous',
        'is_4ps',
        'household_4ps_no',
        'contact_no',
        'email',
        'contact_no',
        'country',
        'province',
        'city',
        'barangay',
        'street',
        'zipcode',

        'father_lname',
        'father_fname',
        'father_mname',
        'father_extension',
        'father_contact_no',
        
        'mother_maiden_lname',
        'mother_maiden_fname',
        'mother_maiden_mname',
        'mother_maiden_extension',
        'mother_maiden_contact_no',

    ];

}
