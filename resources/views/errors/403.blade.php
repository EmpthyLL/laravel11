@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '4 0 3')
@section('message')
    <b>{{ $exception->getMessage() ?: 'Sorry!' }}</b> This page is off-limits. It’s like trying to enter without a password.
@endsection
