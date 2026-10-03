<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;
use App\Models\Persyaratan;

class PersyaratanSeeder extends Seeder
{
    public function run(): void
    {
        // Layanan Pencatatan Nikah dan Rujuk
        $layanan = Layanan::find(1);

        if (!$layanan) {
            $this->command->error(
                'Layanan dengan ID 1 tidak ditemukan.'
            );

            return;
        }

        $persyaratan = [

            [
                'nama_persyaratan' => 'Foto copy KTP, KK, akta kelahiran & ijazah terakhir',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Formulir Surat Pengantar Nikah dari Kepala Desa/Lurah (Model N1)',
                'keterangan' => 'Model N1.pdf',
            ],

            [
                'nama_persyaratan' => 'Formulir Permohonan Kehendak Nikah (Model N2)',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Surat Persetujuan Mempelai (Model N4)',
                'keterangan' => 'Model N4.pdf',
            ],

            [
                'nama_persyaratan' => 'Surat Izin Orang Tua (Model N5)',
                'keterangan' => 'Model N5.pdf',
            ],

            [
                'nama_persyaratan' => 'FC. KTP wali & 2 saksi',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'FC. Kutipan Akta Nikah orangtua calon pengantin wanita',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Imunisasi Tetanus Toxoid (TT) bagi catin wanita',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Surat pernyataan jejaka/gadis atau duda/janda bermaterai Rp. 10.000,- / Surat keterangan belum kawin dari Desa/Kelurahan',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Photo background biru ukuran 4x6 = 1 lembar, 3x4 = 5 lembar dan 2x3 = 5 lembar dengan menggunakan busana muslim (berkopiah/berjilbab)',
                'keterangan' => 'Dalam bentuk lembar & file dikirim ke WA 085858166012',
            ],

            [
                'nama_persyaratan' => 'Jenis dan besaran Mas Kawin',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Surat dispensasi dari pengadilan bagi calon suami dan istri yang berusia kurang dari 19 tahun',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Akta cerai/akta kematian yang berstatus duda/janda',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Jika pernikahan di kecamatan lain harus ada rekomendasi dari KUA kecamatan asal',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Biaya nikah di KUA Rp. 0,- dan Rp. 600.000,- di luar KUA',
                'keterangan' => 'Disetorkan langsung ke bank',
            ],

            [
                'nama_persyaratan' => 'Materai 10.000 (3 lembar)',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'No. HP dan Email Calon Suami & Istri serta No. HP Wali',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Syarat Khusus / Tambahan',
                'keterangan' => null,
            ],

            [
                'nama_persyaratan' => 'Fotocopy Sertifikat Masuk Islam dan Mepamit',
                'keterangan' => 'Bagi Mualaf',
            ],

            [
                'nama_persyaratan' => 'Hindu MEPAMIT FIX HINDU.pdf',
                'keterangan' => 'Cara pengisian: Cara Pengisian MEPAMIT HINDU.pdf',
            ],

            [
                'nama_persyaratan' => 'MEPAMIT NON HINDU.pdf',
                'keterangan' => 'Bagi selain Hindu. Cara pengisian: MEPAMIT NON HINDU.pdf',
            ],

            [
                'nama_persyaratan' => 'Fotocopy passport, visa dan surat keterangan lapor diri dari kepolisian',
                'keterangan' => 'Bagi WNA',
            ],

            [
                'nama_persyaratan' => 'Surat izin dari kedutaan yang diterjemahkan dalam bahasa Indonesia oleh penerjemah resmi',
                'keterangan' => 'Bagi WNA',
            ],

            [
                'nama_persyaratan' => 'Surat izin nikah dari kesatuan',
                'keterangan' => 'Bagi TNI/Polri',
            ],

            [
                'nama_persyaratan' => 'Surat izin dari Pengadilan Agama untuk pernikahan poligami',
                'keterangan' => null,
            ],
        ];

        foreach ($persyaratan as $item) {
            Persyaratan::create([
                'layanan_id' => $layanan->id,
                'nama_persyaratan' => $item['nama_persyaratan'],
                'keterangan' => $item['keterangan'],
            ]);
        }

        $this->command->info(
            count($persyaratan) . ' persyaratan berhasil ditambahkan.'
        );
    }
}
