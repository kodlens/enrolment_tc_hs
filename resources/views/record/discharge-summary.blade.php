@extends('layouts.record-layout')

@section('content')
    <discharge-summary
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </discharge-summary>
@endsection