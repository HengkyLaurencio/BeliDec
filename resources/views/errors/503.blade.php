@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
@section('description', 'Service unavailable. Our servers are currently overloaded or undergoing maintenance. Please try again later.')
