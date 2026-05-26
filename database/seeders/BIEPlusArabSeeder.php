<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramOffline;
use Illuminate\Support\Str;

class BIEPlusArabSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama Arab di bieplus
        ProgramOffline::where('kursus', 'bieplus')->where('program_bahasa', 'Arab')->delete();

        $benefitCamp = [
            '6 kali pertemuan sehari (4 sesi kelas & 2 kegiatan asrama)',
            'Dibimbing pengajar berpengalaman dan kompeten',
            'Metode belajar bervariasi dan menarik',
            "Khithobah, Diroasah Jama'iyyah, Musyahadah, dan Fashl Khoriji",
        ];

        $programsOffline = [
            // === PROGRAM MUHADATSAH ===
            [
                'nama'             => "I'dad (Basic)",
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Muhadatsah',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Mustawa Awwal',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Muhadatsah',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Mustawa Tsani',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Muhadatsah',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Mustawa Tsalits',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Muhadatsah',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            // === PROGRAM BACA KITAB ===
            [
                'nama'             => 'Tamhid',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Baca Kitab',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Muthawassith',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Baca Kitab',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Mutaqaddim',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Baca Kitab',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
            [
                'nama'             => 'Tarjamah',
                'lama_program'     => '1 Bulan',
                'kategori'         => 'Baca Kitab',
                'harga'            => 775000,
                'jadwal_mulai'     => '2026-06-01',
                'jadwal_selesai'   => '2026-06-30',
                'features_program' => json_encode($benefitCamp),
            ],
        ];

        foreach ($programsOffline as $data) {
            ProgramOffline::create([
                'nama'             => $data['nama'],
                'slug'             => Str::slug($data['nama']) . '-arab-bieplus',
                'program_bahasa'   => 'Arab',
                'lama_program'     => $data['lama_program'],
                'kategori'         => $data['kategori'],
                'harga'            => $data['harga'],
                'features_program' => $data['features_program'],
                'jadwal_mulai'     => $data['jadwal_mulai'],
                'jadwal_selesai'   => $data['jadwal_selesai'],
                'lokasi'           => 'Pare, Kediri',
                'kuota'            => 50,
                'is_active'        => 1,
                'kursus'           => 'bieplus',
                'thumbnail'        => null,
            ]);
        }
    }
}