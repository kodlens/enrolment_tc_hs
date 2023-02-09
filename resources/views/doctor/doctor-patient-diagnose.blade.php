@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-diagnose
        prop-patient-admission-id="{{ $admissionId }}"
        prop-patient-id="{{ $patientId }}"
    >
    </doctor-patient-diagnose>

@endsection

