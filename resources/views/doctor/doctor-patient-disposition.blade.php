@extends('layouts.doctor-layout')

@section('content')
    <doctor-patient-disposition
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-patient-disposition>
@endsection