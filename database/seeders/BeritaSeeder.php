<?php
namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'KUA Karang Baru Sukses Selenggarakan Manasik Haji',
                'isi' => 'Kantor Urusan Agama (KUA Kecamatan Karang Baru kembali melaksanakan bimbingan manasik haji bagi calon jemaah haji tahun ini. Kegiatan ini bertujuan untuk memberikan pemahaman mendalam mengenai tata cara ibadah haji sesuai sunnah.',
                'foto' => 'haji.jpg',
            ],
            [
                'judul' => 'Sosialisasi Pentingnya Sertifikasi Halal bagi UMKM',
                'isi' => 'Dalam rangka mendukung produk lokal agar tembus pasar global, KUA Karang Baru bekerja sama dengan penyuluh agama Islam mengadakan sosialisasi dan pendampingan pendaftaran produk halal gratis.',
                'foto' => 'halal.jpg',
            ],
            [
                'judul' => 'Program Bimbingan Perkawinan (Bimwin) Calon Pengantin',
                'isi' => 'Bimwin merupakan program wajib untuk membekali calon pengantin agar memiliki kesiapan mental, spiritual, dan pengetahuan seputar manajemen keluarga sakinah mawaddah wa rahmah.',
                'foto' => 'bimwin.jpg',
            ],
        ];

        foreach ($beritas as $item) {
            Berita::create([
                'judul' => $item['judul'],
                'slug' => Str::slug($item['judul']),
                'isi' => $item['isi'],
                'foto' => $item['foto'],
            ]);
        }
    }
}