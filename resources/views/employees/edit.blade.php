@extends('layouts.default')
@section('title', 'Edit Employee')
@section('content')
    @livewire('employees.edit', ['employee_id' => request()->route('id')])
@endsection