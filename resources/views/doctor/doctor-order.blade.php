@extends('layouts.doctor-layout')

@section('content')
    <doctor-order
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </doctor-order>
@endsection

