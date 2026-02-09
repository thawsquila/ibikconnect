<?php

namespace Database\Seeders;

use App\Models\CdcEvent;
use Illuminate\Database\Seeder;

/**
 * CDC Event Seeder
 * 
 * Seeds CDC events with realistic data
 */
class CdcEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Benchmarking ke Perusahaan Startup',
                'description' => 'Kunjungan industri ke perusahaan startup terkemuka di Jakarta untuk mempelajari ekosistem startup dan peluang karir di industri teknologi.',
                'start_date' => now()->addDays(15)->setTime(9, 0),
                'end_date' => now()->addDays(15)->setTime(15, 0),
                'location' => 'Jakarta',
                'event_type' => 'Kunjungan Industri',
                'max_participants' => 30,
                'registered_count' => 12,
                'requirements' => "- Mahasiswa aktif IBI Kesatuan\n- Membawa KTM\n- Berpakaian rapi (kemeja)\n- Mengisi form pendaftaran",
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Seminar Karier: Membangun Personal Branding',
                'description' => 'Seminar tentang pentingnya personal branding di era digital dan bagaimana membangun brand yang kuat untuk meningkatkan peluang karir.',
                'start_date' => now()->addDays(22)->setTime(13, 0),
                'end_date' => now()->addDays(22)->setTime(16, 0),
                'location' => 'Auditorium IBI Kesatuan',
                'event_type' => 'Seminar',
                'max_participants' => 100,
                'registered_count' => 45,
                'requirements' => "- Terbuka untuk umum\n- Registrasi online\n- Datang tepat waktu",
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Workshop: Teknik Membuat CV yang Menarik',
                'description' => 'Workshop praktis untuk membuat CV yang menarik perhatian recruiter dan meningkatkan peluang dipanggil interview.',
                'start_date' => now()->addDays(28)->setTime(10, 0),
                'end_date' => now()->addDays(28)->setTime(12, 0),
                'location' => 'Lab Komputer 2',
                'event_type' => 'Workshop',
                'max_participants' => 25,
                'registered_count' => 18,
                'requirements' => "- Mahasiswa semester 6-8\n- Membawa laptop\n- Sudah memiliki draft CV",
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Job Fair IBI 2026',
                'description' => 'Bursa kerja tahunan IBI Kesatuan dengan 50+ perusahaan partner yang membuka lowongan untuk fresh graduate dan mahasiswa tingkat akhir.',
                'start_date' => now()->addDays(35)->setTime(8, 0),
                'end_date' => now()->addDays(35)->setTime(17, 0),
                'location' => 'Lapangan IBI Kesatuan',
                'event_type' => 'Job Fair',
                'max_participants' => null, // Unlimited
                'registered_count' => 234,
                'requirements' => "- Mahasiswa semester 7-8 atau alumni\n- Membawa CV (minimal 10 copy)\n- Berpakaian formal\n- Registrasi di tempat",
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Pelatihan Interview Skills',
                'description' => 'Pelatihan intensif untuk meningkatkan kemampuan interview, termasuk mock interview dengan HR profesional.',
                'start_date' => now()->addDays(42)->setTime(9, 0),
                'end_date' => now()->addDays(42)->setTime(16, 0),
                'location' => 'Ruang Seminar Gedung A',
                'event_type' => 'Pelatihan',
                'max_participants' => 40,
                'registered_count' => 28,
                'requirements' => "- Mahasiswa tingkat akhir\n- Sudah pernah apply kerja minimal 1x\n- Komitmen mengikuti full day",
                'is_published' => true,
                'is_registration_open' => true,
            ],
            [
                'title' => 'Webinar: Tren Karir 2026',
                'description' => 'Webinar nasional membahas tren karir dan skill yang dibutuhkan di tahun 2026 bersama praktisi industri.',
                'start_date' => now()->addDays(10)->setTime(19, 0),
                'end_date' => now()->addDays(10)->setTime(21, 0),
                'location' => 'Online (Zoom)',
                'event_type' => 'Webinar',
                'max_participants' => 500,
                'registered_count' => 312,
                'requirements' => "- Terbuka untuk umum\n- Registrasi online\n- Link Zoom akan dikirim H-1",
                'is_published' => true,
                'is_registration_open' => true,
            ],
        ];

        foreach ($events as $eventData) {
            CdcEvent::create($eventData);
        }

        $this->command->info('✓ Created ' . count($events) . ' CDC events');
    }
}
