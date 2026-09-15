<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaranSeeder extends Seeder
{
    public function run(): void
    {
        $user = DB::table('users')->first();

        if (!$user) {
            return;
        }

        DB::table('saran')->insert([
            [
                'user_id' => $user->id,
                'isi_saran' => 'Semoga pelayanan KUA Kecamatan Karang Baru dapat terus ditingkatkan agar masyarakat semakin mudah mendapatkan informasi dan pelayanan.',
                'status' => 'baru',
                'tanggapan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'isi_saran' => 'Sebaiknya informasi mengenai jadwal bimbingan pernikahan diperbarui secara rutin.',
                'status' => 'dibaca',
                'tanggapan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'isi_saran' => 'Mohon informasi pelayanan dibuat lebih lengkap sehingga masyarakat dapat mengetahui persyaratan sebelum datang ke KUA.',
                'status' => 'dibalas',
                'tanggapan' => 'Terima kasih atas saran yang diberikan. Saran tersebut akan menjadi bahan evaluasi untuk meningkatkan pelayanan KUA Kecamatan Karang Baru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}