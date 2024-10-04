@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
    <b>Oh no!</b> Something went wrong on our end. 
@endsection