@extends('layouts.nurse-layout')

@section('content')
    <nurse-notes
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">
    </nurse-notes>
@endsection

