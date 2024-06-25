@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
@section('description', 'Server error. Something went wrong on our end. Please try again later.')
