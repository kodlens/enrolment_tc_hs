<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOrderDetail extends Model
{
    use HasFactory;


    protected $table = 'doctor_order_details';
    protected $primaryKey = 'doctor_order_detail_id';

    protected $fillable = [
        'doctor_order_id',
        'doctor_date_time_created',
        'progress_notes',
        'order',
        'letter_c',
        'letter_a',
        'letter_r',
        'letter_e',
        'letter_d',
        'nurse_date_time_execute',
        'nurse_id'


    ];



    public function doctor_order(){
        return $this->belongsTo(DoctorOrder::class, 'doctor_order_id', 'doctor_order_id');
    }

    public function nurse(){
        return $this->hasOne(User::class, 'user_id', 'nurse_id');

    }


}
