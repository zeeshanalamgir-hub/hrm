@extends('layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <x-page-header
        :title="$greeting"
        subtitle="Here’s what’s happening with your business today."
        eyebrow="Your business at a glance"
        sparkle
    />
@endsection
