@extends('layouts.appmasyarakat')

@section('title', 'Profil Saya')

@section('content')

<style>

/* =========================================================
   PROFIL PAGE
========================================================= */

.profil-page {
    width: 100%;
    padding: 8px 0 30px;
}


/* =========================================================
   HEADER
========================================================= */

.profil-header {
    margin-bottom: 18px;
}

.profil-header h3 {
    margin: 0;

    font-size: 24px;
    font-weight: 700;

    color: #14532d;
}

.profil-header p {
    margin: 5px 0 0;

    font-size: 13px;

    color: #64748b;
}


/* =========================================================
   MAIN CARD
========================================================= */

.profil-card {
    width: 100%;

    background: #ffffff;

    border: 1px solid #e2e8f0;

    border-radius: 12px;

    box-shadow:
        0 3px 12px rgba(15, 23, 42, 0.05);

    overflow: hidden;
}


/* =========================================================
   CARD HEADER
========================================================= */

.profil-card-header {
    padding: 16px 20px;

    background: linear-gradient(
        135deg,
        #166534,
        #15803d
    );

    color: #ffffff;
}

.profil-card-header h5 {
    margin: 0;

    font-size: 16px;

    font-weight: 700;
}

.profil-card-header p {
    margin: 4px 0 0;

    font-size: 12px;

    color: rgba(255, 255, 255, 0.85);
}


/* =========================================================
   CARD BODY
========================================================= */

.profil-card-body {
    padding: 22px 20px;
}


/* =========================================================
   USER INFO
========================================================= */

.profil-user {
    display: flex;

    align-items: center;

    gap: 14px;

    padding-bottom: 20px;

    margin-bottom: 20px;

    border-bottom: 1px solid #e5e7eb;
}


/* =========================================================
   AVATAR
========================================================= */

.profil-avatar {
    width: 60px;
    height: 60px;

    min-width: 60px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #166534,
        #22c55e
    );

    color: #ffffff;

    font-size: 23px;

    font-weight: 700;

    text-transform: uppercase;
}


/* =========================================================
   USER NAME
========================================================= */

.profil-user-info {
    min-width: 0;
}

.profil-user-info h4 {
    margin: 0 0 5px;

    font-size: 18px;

    font-weight: 700;

    color: #1e293b;

    word-break: break-word;
}

.profil-user-info span {
    display: inline-block;

    padding: 4px 10px;

    border-radius: 20px;

    background: #dcfce7;

    color: #166534;

    font-size: 11px;

    font-weight: 600;
}


/* =========================================================
   FORM
========================================================= */

.profil-form-group {
    margin-bottom: 16px;
}

.profil-form-label {
    display: block;

    margin-bottom: 6px;

    color: #334155;

    font-size: 13px;

    font-weight: 600;
}

.profil-form-control {
    width: 100%;

    min-height: 43px;

    padding: 9px 12px;

    border: 1px solid #dbe3e8;

    border-radius: 8px;

    background: #ffffff;

    color: #1e293b;

    font-size: 13px;

    outline: none;

    transition: all 0.2s;
}

.profil-form-control:focus {
    border-color: #16a34a;

    box-shadow:
        0 0 0 3px rgba(22, 163, 74, 0.10);
}

textarea.profil-form-control {
    min-height: 90px;

    resize: vertical;
}


/* =========================================================
   BUTTON
========================================================= */

.btn-profil-save {
    border: none;

    border-radius: 8px;

    padding: 10px 17px;

    background: linear-gradient(
        135deg,
        #15803d,
        #16a34a
    );

    color: #ffffff;

    font-size: 13px;

    font-weight: 600;

    cursor: pointer;

    transition: all 0.2s;
}

.btn-profil-save:hover {
    background: linear-gradient(
        135deg,
        #166534,
        #15803d
    );

    transform: translateY(-1px);
}


/* =========================================================
   ALERT
========================================================= */

.profil-alert {
    border-radius: 8px;

    font-size: 13px;

    margin-bottom: 18px;
}


/* =========================================================
   ERROR
========================================================= */

.profil-error {
    margin-top: 5px;

    color: #dc2626;

    font-size: 11px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .profil-page {
        padding: 5px 0 20px;
    }

    .profil-header {
        margin-bottom: 14px;
    }

    .profil-header h3 {
        font-size: 20px;
    }

    .profil-header p {
        font-size: 12px;
    }

    .profil-card-header {
        padding: 14px 15px;
    }

    .profil-card-header h5 {
        font-size: 15px;
    }

    .profil-card-body {
        padding: 17px 15px;
    }

    .profil-avatar {
        width: 52px;
        height: 52px;

        min-width: 52px;

        font-size: 20px;
    }

    .profil-user-info h4 {
        font-size: 16px;
    }

    .profil-form-control {
        min-height: 42px;

        font-size: 13px;
    }

    .btn-profil-save {
        width: 100%;
    }

}

</style>


<div class="container-fluid profil-page">


    {{-- =====================================================
         HEADER PROFIL
    ====================================================== --}}

    <div class="profil-header">

        <h3>
            <i class="bi bi-person-circle me-2"></i>
            Profil Saya
        </h3>

        <p>
            Kelola informasi akun dan data pribadi Anda.
        </p>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success profil-alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger profil-alert">

            <i class="bi bi-exclamation-circle me-2"></i>

            Terdapat data yang belum benar. Silakan periksa kembali.

        </div>

    @endif


    {{-- =====================================================
         CARD UTAMA PROFIL
    ====================================================== --}}

    <div class="profil-card">


        {{-- =================================================
             CARD HEADER
        ================================================== --}}

        <div class="profil-card-header">

            <h5>

                <i class="bi bi-person-vcard me-2"></i>

                Informasi Profil

            </h5>

            <p>

                Informasi akun masyarakat

            </p>

        </div>


        {{-- =================================================
             CARD BODY
        ================================================== --}}

        <div class="profil-card-body">


            {{-- =================================================
                 IDENTITAS USER
            ================================================== --}}

            <div class="profil-user">


                {{-- AVATAR --}}

                <div class="profil-avatar">

                    {{ strtoupper(substr($user->nama ?? 'M', 0, 1)) }}

                </div>


                {{-- NAMA --}}

                <div class="profil-user-info">

                    <h4>

                        {{ $user->nama }}

                    </h4>

                    <span>

                        Masyarakat

                    </span>

                </div>


            </div>


            {{-- =================================================
                 FORM PROFIL
            ================================================== --}}

            <form
                action="{{ route('masyarakat.profil.update') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- =================================================
                     NAMA
                ================================================== --}}

                <div class="profil-form-group">

                    <label
                        for="nama"
                        class="profil-form-label"
                    >

                        Nama Lengkap

                    </label>


                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="profil-form-control"
                        value="{{ old('nama', $user->nama) }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >


                    @error('nama')

                        <div class="profil-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     EMAIL
                ================================================== --}}

                <div class="profil-form-group">

                    <label
                        for="email"
                        class="profil-form-label"
                    >

                        Email

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="profil-form-control"
                        value="{{ old('email', $user->email) }}"
                        placeholder="Masukkan email"
                        required
                    >


                    @error('email')

                        <div class="profil-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     NOMOR HP
                ================================================== --}}

                <div class="profil-form-group">

                    <label
                        for="no_hp"
                        class="profil-form-label"
                    >

                        Nomor HP

                    </label>


                    <input
                        type="text"
                        id="no_hp"
                        name="no_hp"
                        class="profil-form-control"
                        value="{{ old('no_hp', $user->no_hp) }}"
                        placeholder="Masukkan nomor HP"
                    >


                    @error('no_hp')

                        <div class="profil-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     ALAMAT
                ================================================== --}}

                <div class="profil-form-group">

                    <label
                        for="alamat"
                        class="profil-form-label"
                    >

                        Alamat

                    </label>


                    <textarea
                        id="alamat"
                        name="alamat"
                        class="profil-form-control"
                        placeholder="Masukkan alamat lengkap"
                    >{{ old('alamat', $user->alamat) }}</textarea>


                    @error('alamat')

                        <div class="profil-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     BUTTON
                ================================================== --}}

                <button
                    type="submit"
                    class="btn-profil-save"
                >

                    <i class="bi bi-check2-circle me-1"></i>

                    Simpan Perubahan

                </button>


            </form>


        </div>

    </div>

</div>

@endsection