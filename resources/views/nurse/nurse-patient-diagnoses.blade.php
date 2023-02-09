@extends('layouts.nurse-layout')

@section('content')
    <nurse-patient-diagnoses 
        prop-patient-id="{{ $patientId }}"
        prop-patient='@json($patient)'

        ></nurse-patient-diagnoses>
@endsection

