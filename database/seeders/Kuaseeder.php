<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Kuaseeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DATA ADMIN
        |--------------------------------------------------------------------------
        */

        DB::table('users')->updateOrInsert(
            [
                'email' => 'admin@kua.test'
            ],
            [
                'nama' => 'Admin KUA Karang Baru',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'no_hp' => '081234567890',
                'alamat' => 'KUA Karang Baru',
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | DATA MASYARAKAT
        |--------------------------------------------------------------------------
        */

        DB::table('users')->updateOrInsert(
            [
                'email' => 'masyarakat@kua.test'
            ],
            [
                'nama' => 'Masyarakat KUA',
                'password' => Hash::make('masyarakat123'),
                'role' => 'masyarakat',
                'no_hp' => '081234567891',
                'alamat' => 'Karang Baru, Aceh Tamiang',
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | AMBIL ID USER MASYARAKAT
        |--------------------------------------------------------------------------
        */

        $masyarakatId = DB::table('users')
            ->where('email', 'masyarakat@kua.test')
            ->value('id');


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN KUA
        |--------------------------------------------------------------------------
        |
        | Struktur tabel layanan:
        | id
        | judul
        | isi
        | created_at
        | updated_at
        |
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 1
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->where('id', 1)->update([
            'judul' => 'Pencatatan Nikah dan Rujuk',

            'isi' => 'Layanan Pencatatan Nikah dan Rujuk merupakan pelayanan KUA kepada masyarakat dalam proses administrasi pernikahan dan rujuk. Layanan ini meliputi pendaftaran nikah, pemeriksaan berkas dan persyaratan, pemeriksaan calon pengantin, pencatatan pernikahan, penerbitan buku nikah, pengajuan duplikat buku nikah, serta pelayanan rujuk sesuai dengan ketentuan yang berlaku.',

            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 2
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->where('id', 2)->update([
            'judul' => 'Bimbingan Perkawinan',

            'isi' => 'Bimbingan bagi calon pengantin sebagai persiapan dalam membangun kehidupan rumah tangga yang harmonis, sakinah, mawaddah, dan rahmah. Kegiatan ini memberikan pembekalan mengenai kehidupan berumah tangga, tanggung jawab suami dan istri, komunikasi dalam keluarga, serta pembinaan keluarga yang baik.',

            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 3
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->where('id', 3)->update([
            'judul' => 'Konsultasi Keluarga Sakinah',

            'isi' => 'Layanan konsultasi dan bimbingan bagi masyarakat dalam menghadapi berbagai persoalan keluarga dan kehidupan rumah tangga. Konsultasi diberikan sebagai upaya membantu masyarakat membangun keluarga yang harmonis, sakinah, mawaddah, dan rahmah.',

            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 4
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->where('id', 4)->update([
            'judul' => 'Bimbingan dan Penerangan Agama Islam',

            'isi' => 'Layanan penyuluhan dan bimbingan keagamaan kepada masyarakat, termasuk pembinaan kehidupan beragama dan pelayanan surat keterangan mualaf sesuai dengan ketentuan yang berlaku.',

            'updated_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 5
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->updateOrInsert(
            [
                'judul' => 'Pengelolaan Zakat dan Wakaf'
            ],
            [
                'isi' => 'Layanan informasi dan administrasi zakat dan wakaf, termasuk akta ikrar wakaf serta informasi mengenai wakaf tanah atau benda sesuai dengan ketentuan yang berlaku.',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 6
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->updateOrInsert(
            [
                'judul' => 'Pembinaan Kemasjidan'
            ],
            [
                'isi' => 'Layanan pembinaan masjid, rekomendasi kegiatan kemasjidan, serta pembinaan administrasi dan manajemen masjid untuk mendukung pengelolaan masjid yang baik.',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 7
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->updateOrInsert(
            [
                'judul' => 'Bimbingan Manasik Haji'
            ],
            [
                'isi' => 'Layanan bimbingan dan persiapan calon jamaah haji mengenai tata cara pelaksanaan ibadah haji, manasik, serta persiapan sebelum melaksanakan ibadah haji.',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | LAYANAN 8
        |--------------------------------------------------------------------------
        */

        DB::table('layanan')->updateOrInsert(
            [
                'judul' => 'Hisab Rukyat dan Pembinaan Syariah'
            ],
            [
                'isi' => 'Layanan informasi mengenai waktu ibadah, hisab rukyat, serta edukasi dan pembinaan syariat Islam kepada masyarakat.',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | DATA CONTOH PERMOHONAN
        |--------------------------------------------------------------------------
        */

        DB::table('permohonan')->updateOrInsert(
            [
                'nomor_permohonan' => 'KUA-2026-0001'
            ],
            [
                'user_id' => $masyarakatId,
                'layanan_id' => 1,
                'tanggal_pengajuan' => now()->toDateString(),
                'status' => 'diajukan',
                'keterangan' => 'Permohonan pencatatan nikah dan rujuk.',
                'updated_at' => now(),
            ]
        );
    }
}