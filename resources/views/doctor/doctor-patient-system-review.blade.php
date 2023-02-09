@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-system-review
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-patient-system-review>
@endsection

