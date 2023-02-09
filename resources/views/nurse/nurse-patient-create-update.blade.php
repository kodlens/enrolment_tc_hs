@extends('layouts.nurse-layout')

@section('content')

@if(isset($data))
    <nurse-patient-create-update
        prop-nationalities='@json($nationalities)'
        prop-religions='@json($religions)'
        prop-data='@json($data)'
       
    ></nurse-patient-create-upda>

@else
    <nurse-patient-create-update
        prop-nationalities='@json($nationalities)'
        prop-religions='@json($religions)'
        prop-data=''
        prop-lname="{{ $lname }}"
        prop-fname="{{ $fname }}"
    ></nurse-patient-create-upda>
@endif
   
@endsection

