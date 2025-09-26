@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center bg-gradient-primary text-white fs-4 fw-bold">
                <i class="bi bi-person-plus-fill me-2"></i>Register Account
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Foto Profil --}}
                        <div class="col-md-4 text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <img id="fotoPreview" src="{{ asset('images/default-avatar.png') }}" 
                                     class="rounded-circle shadow" width="150" height="150" 
                                     style="object-fit: cover; border: 3px solid #0d6efd;">
                                <label for="foto_profil" class="btn btn-primary btn-sm position-absolute" 
                                       style="bottom: 10px; right: 10px; border-radius: 50%;">
                                    <i class="bi bi-camera"></i>
                                </label>
                                <input type="file" id="foto_profil" name="foto_profil" class="d-none" accept="image/*">
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">Upload Foto Profil (Opsional)</small>
                            </div>
                        </div>

                        {{-- Form Data --}}
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" id="nim" name="nim" 
                                           class="form-control @error('nim') is-invalid @enderror" 
                                           value="{{ old('nim') }}" required>
                                    @error('nim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                                           class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                           value="{{ old('tempat_lahir') }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                           value="{{ old('tanggal_lahir') }}" required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold py-2">
                        <i class="bi bi-person-check me-2"></i>Daftar Sekarang
                    </button>
                </form>
            </div>
            <div class="card-footer text-center bg-light">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a>
            </div>
        </div>
    </div>
</div>

<script>
// Preview foto sebelum upload
document.getElementById('foto_profil').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('fotoPreview').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
});
</script>

<style>
.card {
    border-radius: 15px;
}
.bg-gradient-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
}
.rounded-circle {
    transition: transform 0.3s ease;
}
.rounded-circle:hover {
    transform: scale(1.05);
}
</style>
@endsection