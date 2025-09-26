@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4 fw-bold">
        Selamat Datang di Aplikasi Laravel 🚀
    </h1>
    <p class="lead mt-3">
        Ini adalah halaman Home. Silakan Register atau Login untuk melanjutkan.
    </p>
    <div class="mt-4">
        <a href="{{ route('register') }}" class="btn btn-success btn-lg me-2">Register</a>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
    </div>
</div>
@endsection
