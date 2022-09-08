@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
<a href="{{ url('/login') }}">Back to login</a>
