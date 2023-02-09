@extends('layouts.nurse-layout')

@section('content')
    <nurse-patient-diagnose-doctor-orders
        prop-patient-diagnose-id="{{ $patient_diagnose_id }}"
        ></nurse-patient-diagnose-doctor-orders>
@endsection

