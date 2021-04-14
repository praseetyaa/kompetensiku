@extends('template/guest/main')

@section('title', 'Tentang Kami | ')

@section('content')
<div class="bg-theme-1 text-center" style="height: 200px">
    <h3 class="text-white pt-5">Selamat Datang</h3>
</div>
<div class="container" style="top: -5em; position: relative;">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <img width="130" class="me-3 flex-shrink-0" src="{{ asset('assets/images/logo/'.get_icon()) }}">
                <div class="content">
                    <p>Selamat datang di Kompetensiku. Kami adalah Konsultan Pengembangan Kompetensi Sumber Daya Manusia dan Pusat Pendidikan dan pelatihan untuk para praktisi pengembangan sumber daya manusia (HRD) dengan Sertifikat BNSP (Badan Nasional Sertifikasi Profesi) untuk skema staf sdm, supervisor sdm, kepala bagian sdm, manajer sdm, dan direktur sdm.</p>
                    <a href="https://wa.me/{{ get_nomor_whatsapp() }}" class="btn btn-theme-1" target="_blank"><i class="fab fa-whatsapp"></i> Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="heading text-center mb-5">
        <h3>Program Pelatihan dan Sertifikasi Praktisi Sumber Daya Manusia</h3>
        <div class="rounded-2 w-25 mx-auto" style="border: 3px solid var(--color-1)"></div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="m-0">Level Staf</h5>
                </div>
                <p>
                    <ol class="level-list">
                        <li>Staf Kompensasi dan Benefit</li>
                        <li>Staf Penggajian</li>
                        <li>Staf Renumerasi</li>
                        <li>Staf Administrasi Sumber Daya Manusia (SDM)</li>
                        <li>Staf Sumber Daya Manusia (SDM)</li>
                        <li>Staf Perencanaan Sumber Daya Manusia (SDM)</li>
                        <li>Staf Rekrutmen dan Seleksi (SRS)</li>
                        <li>Staf Manajemen Talenta (SMT)</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="m-0">Level Supervisor</h5>
                </div>
                <p>
                    <ol class="level-list">
                        <li>Supervisor Pengadaan, Penyeleksian, dan Penempatan Sumber Daya Manusia (SPPPSDM)</li>
                        <li>Supervisor Pelatihan dan Pengembangan Sumber Daya Manusia (SPPSDM)</li>
                        <li>Supervisor Hubungan Industrial (SHI)</li>
                        <li>Supervisor Manajemen Kinerja dan Karir (SMKK)</li>
                        <li>Supervisor Manajemen Talenta (SMT)</li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="m-0">Level Manajer</h5>
                </div>
                <p>
                    <ol class="level-list">
                        <li>Manajer Sumber Daya Manusia (MSDM)</li>
                        <li>Manajer Human Capital (MHC)</li>
                        <li>Manajer Pengembangan Sumber Daya Manusia (PSDM)</li>
                        <li>Manajer Administrasi dan Personalia (MAP)</li>
                    </ol>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="heading text-center mb-5">
        <h3>Mengapa Kami?</h3>
        <div class="rounded-2 w-25 mx-auto" style="border: 3px solid var(--color-1)"></div>
    </div>
</div>
@endsection