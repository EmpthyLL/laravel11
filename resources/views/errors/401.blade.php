@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '4 0 1')
@section('message')
    <b>Oh no!</b> Looks like you're not authorized to access this page.
@endsection
