@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '4 2 9')
@section('message')
    <b>Opps!</b> You’ve hit the request limit!
@endsection
