@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-profile
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-patient-profile>
@endsection

