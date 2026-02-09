<?php

namespace Database\Seeders;

use App\Models\BeiEvent;
use Illuminate\Database\Seeder;

/**
 * BEI Event Seeder
 * 
 * Seeds BEI (Gallery Bursa Efek Indonesia) events
 */
class BeiEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Sekolah Pasar Modal Level 1',
                'description' => 'Program edukasi dasar tentang pasar modal Indonesia, instrumen investasi, dan cara memulai investasi saham untuk pemula.',
                'starts_at' => now()->addDays(12)->setTime(9, 0),
                'location' => 'Gallery BEI IBI Kesatuan',
                'max_participants' => 50,
                'registered_count' => 32,
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Investment Masterclass',
                'description' => 'Kelas intensif tentang strategi investasi jangka panjang, analisis fundamental, dan manajemen portofolio bersama fund manager profesional.',
                'starts_at' => now()->addDays(20)->setTime(13, 0),
                'location' => 'Auditorium IBI Kesatuan',
                'max_participants' => 100,
                'registered_count' => 67,
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Webinar Nasional Pasar Modal',
                'description' => 'Webinar nasional membahas outlook pasar modal Indonesia 2026 dan peluang investasi di berbagai sektor.',
                'starts_at' => now()->addDays(8)->setTime(19, 0),
                'location' => 'Online (Zoom)',
                'max_participants' => 300,
                'registered_count' => 189,
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Workshop Analisis Teknikal',
                'description' => 'Workshop praktis tentang analisis teknikal saham, membaca chart, dan menggunakan indikator untuk timing entry dan exit.',
                'starts_at' => now()->addDays(25)->setTime(10, 0),
                'location' => 'Lab Trading Gallery BEI',
                'max_participants' => 30,
                'registered_count' => 24,
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Seminar: Investasi Syariah di Pasar Modal',
                'description' => 'Seminar tentang investasi syariah, saham-saham yang masuk kategori syariah, dan prinsip-prinsip investasi sesuai syariat Islam.',
                'starts_at' => now()->addDays(30)->setTime(14, 0),
                'location' => 'Auditorium IBI Kesatuan',
                'max_participants' => 80,
                'registered_count' => 45,
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Kunjungan ke Bursa Efek Indonesia',
                'description' => 'Kunjungan langsung ke gedung BEI Jakarta untuk melihat trading floor dan memahami mekanisme perdagangan saham secara real-time.',
                'starts_at' => now()->addDays(35)->setTime(9, 0),
                'location' => 'Gedung BEI, Jakarta',
                'max_participants' => 40,
                'registered_count' => 28,
                'is_published' => true,
                'is_registration_open' => true,
            ],
        ];

        foreach ($events as $eventData) {
            BeiEvent::create($eventData);
        }

        $this->command->info('✓ Created ' . count($events) . ' BEI events');
    }
}
