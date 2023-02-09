@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-history
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-patient-history>
@endsection

