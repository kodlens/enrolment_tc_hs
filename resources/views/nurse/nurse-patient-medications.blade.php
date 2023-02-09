@extends('layouts.nurse-layout')

@section('content')
    <nurse-patient-medications
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </nurse-patient-medications>
@endsection

