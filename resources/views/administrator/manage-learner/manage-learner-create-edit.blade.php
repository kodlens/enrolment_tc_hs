@extends('layouts.admin')

@section('content')
    <manage-learner-create-edit prop-data='@json($data)'></manage-learner-create-edit>
@endsection

