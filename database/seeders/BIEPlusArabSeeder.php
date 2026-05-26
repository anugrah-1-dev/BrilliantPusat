<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramOffline;
use App\Models\ProgramOnline;
use Illuminate\Support\Str;

class BIEPlusArabSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama Arab di bieplus
        ProgramOffline::where('kursus', 'bieplus')->where('program_bahasa', 'Arab')->delete();
        ProgramOnline::where('kursus', 'bieplus')->where('program_bahasa', 'Arab')->delete();

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

        $benefitOnline = [
            '2x pertemuan 90 menit per hari',
            'Dibimbing pengajar berpengalaman dan kompeten',
            'Metode belajar bervariasi dan menarik',
            "Khithobah, Diroasah Jama'iyyah, Musyahadah, dll",
        ];

        $programsOnline = [
            // === 1 BULAN ONLINE ===
            [
                'nama'     => "I'dad (Basic) - Online",
                'kategori' => 'Muhadatsah',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Mustawa Awwal - Online',
                'kategori' => 'Muhadatsah',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Mustawa Tsani - Online',
                'kategori' => 'Muhadatsah',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Mustawa Tsalits - Online',
                'kategori' => 'Muhadatsah',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Tamhid - Online',
                'kategori' => 'Baca Kitab',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Muthawassith - Online',
                'kategori' => 'Baca Kitab',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Mutaqaddim - Online',
                'kategori' => 'Baca Kitab',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            [
                'nama'     => 'Tarjamah - Online',
                'kategori' => 'Baca Kitab',
                'harga'    => 396000,
                'lama_program' => '1 Bulan',
            ],
            // === 2 PEKAN ONLINE ===
            [
                'nama'     => "I'dad (Basic) - Online 2 Pekan",
                'kategori' => 'Muhadatsah',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Mustawa Awwal - Online 2 Pekan',
                'kategori' => 'Muhadatsah',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Mustawa Tsani - Online 2 Pekan',
                'kategori' => 'Muhadatsah',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Mustawa Tsalits - Online 2 Pekan',
                'kategori' => 'Muhadatsah',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Tamhid - Online 2 Pekan',
                'kategori' => 'Baca Kitab',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Muthawassith - Online 2 Pekan',
                'kategori' => 'Baca Kitab',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Mutaqaddim - Online 2 Pekan',
                'kategori' => 'Baca Kitab',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
            [
                'nama'     => 'Tarjamah - Online 2 Pekan',
                'kategori' => 'Baca Kitab',
                'harga'    => 189000,
                'lama_program' => '2 Pekan',
            ],
        ];

        foreach ($programsOnline as $data) {
            ProgramOnline::create([
                'nama'             => $data['nama'],
                'slug'             => Str::slug($data['nama']) . '-arab-bieplus',
                'program_bahasa'   => 'Arab',
                'lama_program'     => $data['lama_program'],
                'kategori'         => $data['kategori'],
                'harga'            => $data['harga'],
                'features_program' => json_encode($benefitOnline),
                'is_active'        => 1,
                'kursus'           => 'bieplus',
                'thumbnail'        => null,
            ]);
        }
    }
}