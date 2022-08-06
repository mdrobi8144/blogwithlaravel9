@extends('layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? pageTitle : "Author | Password Reset Form")
@section('content')
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.svg') }}" height="36" alt=""></a>
        </div>
        @livewire('author.author-pass-reset-form')
    </div>
</div>
@endsection