@extends('layouts.nurse-layout')

@section('content')
    <nurse-cared
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </nurse-cared>
@endsection

