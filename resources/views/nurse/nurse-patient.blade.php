@extends('layouts.nurse-layout')

@section('content')
    <nurse-patient prop-doctors='@json($doctors)'></nurse-patient>
@endsection

