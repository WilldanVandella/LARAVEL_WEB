@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="position-relative d-inline-block mb-3">
                        <!-- GUNAKAN ACCESSOR YANG BENAR -->
                        <img src="{{ Auth::user()->foto_profil_url }}" 
                             class="rounded-circle shadow" width="120" height="120" 
                             style="object-fit: cover; border: 4px solid #0d6efd;"
                             onerror="this.onerror=null; this.src='{{ asset('images/default-avatar.png') }}'">
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1" 
                              style="border: 3px solid white;">
                            <i class="bi bi-check-lg text-white"></i>
                        </span>
                    </div>
                    <h4 class="mb-1 fw-bold">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
                    <span class="badge bg-primary fs-6">{{ Auth::user()->nim }}</span>
                    
                    <!-- Debug Info (Sementara) -->
                    <div class="mt-2 p-2 bg-light rounded small">
                        <div>Foto: {{ Auth::user()->foto_profil ? 'Ada' : 'Tidak Ada' }}</div>
                        <div>Path: {{ Auth::user()->foto_profil }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Welcome Card -->
            <div class="card shadow-sm border-0 bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 🎉</h2>
                            <p class="mb-0">Senang melihat Anda kembali. Berikut ringkasan aktivitas terbaru Anda.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <i class="bi bi-graph-up-arrow display-4 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Details Card -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-transparent">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-badge me-2"></i>Profile Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>NIM:</strong></td>
                                    <td>{{ Auth::user()->nim }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Lengkap:</strong></td>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Tempat Lahir:</strong></td>
                                    <td>{{ Auth::user()->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Lahir:</strong></td>
                                    <td>{{ Auth::user()->tanggal_lahir->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Umur:</strong></td>
                                    <td>{{ Auth::user()->umur }} tahun</td>
                                </tr>
                                <tr>
                                    <td><strong>Foto Profil:</strong></td>
                                    <td>{{ Auth::user()->foto_profil ? '✓ Diupload' : '✗ Default' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
}
.card {
    border-radius: 10px;
}
</style>
@endsection