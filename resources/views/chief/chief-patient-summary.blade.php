@extends('layouts.chief-layout')

@section('content')
    <chief-patient-summary
            prop-patient-admission-id="{{ $admissionId }}"
            prop-patient-id="{{ $patientId }}">

    </chief-patient-summary>
@endsection