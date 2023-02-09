@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-physical-exam
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-patient-physical-exam>
@endsection

