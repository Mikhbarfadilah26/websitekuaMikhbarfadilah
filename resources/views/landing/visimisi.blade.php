@extends('layouts.applanding')

@section('title', 'Visi, Misi & Motto - Kantor Urusan Agama Karang Baru')

@section('content')
<div class="container py-5 mt-5">
    {{-- HEADER SECTION --}}
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8" data-aos="fade-up">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold mb-3 border border-success border-opacity-25">
                <i class="fas fa-mosque me-1"></i> Kantor Urusan Agama Kecamatan Karang Baru
            </span>
            <h1 class="fw-bold text-white mb-2 display-5">Visi, Misi & Motto</h1>
            <p class="text-white-50">Pedoman Pelayanan Prima dan Keagamaan Berbasis Nilai-Nilai Religius</p>
        </div>
    </div>

    {{-- VISI & MOTTO SECTION --}}
    <div class="row g-4 justify-content-center mb-4">
        {{-- VISI --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 position-relative" style="background: linear-gradient(135deg, rgba(10, 40, 25, 0.95), rgba(15, 30, 20, 0.9)); backdrop-filter: blur(16px); border: 1px solid rgba(40, 167, 69, 0.2) !important;">
                {{-- Background Watermark Logo Kemenag --}}
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="pointer-events: none; z-index: 0;">
                    <img src="{{ asset('dist/img/7.png') }}" alt="Watermark Kemenag" style="width: 280px; height: 280px; opacity: 0.07; object-fit: contain;">
                </div>
                <div class="card-body p-4 p-md-5 text-center d-flex flex-column justify-content-center position-relative" style="z-index: 1;">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle p-3 mb-2 shadow-sm" style="width: 65px; height: 65px; border: 1px solid rgba(40, 167, 69, 0.3);">
                            <i class="fas fa-eye fa-2x text-success"></i>
                        </span>
                        <h3 class="fw-bold text-success h4 tracking-wide text-uppercase">Visi</h3>
                    </div>
                    <blockquote class="blockquote mb-0">
                        <p class="text-light fst-italic fs-5 lh-base fw-bold px-md-3">
                            "TERWUJUDNYA MASYARAKAT KARANG BARU YANG TAAT BERAGAMA, SEJAHTERA DAN BAHAGIA."
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>

        {{-- MOTTO --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 position-relative" style="background: linear-gradient(135deg, rgba(10, 40, 25, 0.95), rgba(15, 30, 20, 0.9)); backdrop-filter: blur(16px); border: 1px solid rgba(40, 167, 69, 0.2) !important;">
                {{-- Background Watermark Logo Kemenag --}}
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="pointer-events: none; z-index: 0;">
                    <img src="{{ asset('dist/img/7.png') }}" alt="Watermark Kemenag" style="width: 220px; height: 220px; opacity: 0.07; object-fit: contain;">
                </div>
                <div class="card-body p-4 p-md-5 text-center d-flex flex-column justify-content-center position-relative" style="z-index: 1;">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle p-3 mb-2 shadow-sm" style="width: 65px; height: 65px; border: 1px solid rgba(40, 167, 69, 0.3);">
                            <i class="fas fa-hand-holding-heart fa-2x text-success"></i>
                        </span>
                        <h3 class="fw-bold text-success h4 tracking-wide text-uppercase">Motto</h3>
                    </div>
                    <blockquote class="blockquote mb-0">
                        <p class="text-light fst-italic fs-5 lh-base fw-bold">
                            "MELAYANI DENGAN IKHLAS"
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    {{-- MISI SECTION --}}
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative" style="background: linear-gradient(135deg, rgba(10, 40, 25, 0.95), rgba(15, 30, 20, 0.9)); backdrop-filter: blur(16px); border: 1px solid rgba(40, 167, 69, 0.2) !important;">
                {{-- Background Watermark Logo Kemenag --}}
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="pointer-events: none; z-index: 0;">
                    <img src="{{ asset('dist/img/7.png') }}" alt="Watermark Kemenag" style="width: 450px; height: 450px; opacity: 0.05; object-fit: contain;">
                </div>
                <div class="card-body p-4 p-md-5 position-relative" style="z-index: 1;">
                    <div class="text-center mb-4">
                        <span class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle p-3 mb-2 shadow-sm" style="width: 65px; height: 65px; border: 1px solid rgba(40, 167, 69, 0.3);">
                            <i class="fas fa-tasks fa-2x text-success"></i>
                        </span>
                        <h3 class="fw-bold text-success h4 tracking-wide text-uppercase">Misi</h3>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">1</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kualitas pemahaman dan pengamalan ajaran Islam.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">2</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kerjasama lintas sektoral dan kemitraan umat.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">3</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kualitas pelayanan kepenghuluan dan keluarga sakinah.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">4</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kualitas pelayanan zakat, wakaf, produk halal dan kemasjidan.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">5</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kualitas pelayanan manasik haji, hisab, rukyat dan pembinaan syariah.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start h-100 p-3 rounded-3 shadow-sm" style="background: rgba(20, 50, 30, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <span class="badge bg-success text-white rounded-pill me-3 mt-1 px-2 py-1 fw-bold shadow-sm">6</span>
                                <p class="text-light mb-0 small lh-base">Meningkatkan kualitas SDM dan data KUA.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection