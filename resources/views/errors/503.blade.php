@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message')
    <b>Sorry!</b> We’re currently unavailable. 
@endsection
