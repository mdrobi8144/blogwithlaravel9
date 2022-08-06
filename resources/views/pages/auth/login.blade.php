@extends('layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? pageTitle : "Author | Login")
@section('content')
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="../static/logo.svg" height="36" alt=""></a>
        </div>

        @livewire('author.author-login-form')
        
        <div class="text-center text-muted mt-3">
            Don't have account yet? <a href="{{ route('author.register') }}" tabindex="-1">Sign up</a>
        </div>
    </div>
</div>
@endsection