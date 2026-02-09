<?php

namespace Database\Seeders;

use App\Models\CdcNews;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * CDC News Seeder
 * 
 * Seeds news articles with realistic content
 */
class CdcNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cdcAdmin = User::where('role', User::ROLE_CDC_ADMIN)->first();

        $news = [
            [
                'title' => 'Mahasiswa IBI Raih Juara 1 Kompetisi Bisnis Nasional',
                'slug' => 'mahasiswa-ibi-raih-juara-1-kompetisi-bisnis-nasional',
                'excerpt' => 'Tim mahasiswa IBI Kesatuan berhasil meraih juara 1 dalam Kompetisi Business Plan Nasional 2026 yang diselenggarakan oleh Kementerian Pendidikan.',
                'content' => "Tim mahasiswa IBI Kesatuan yang terdiri dari Ahmad Fauzi, Siti Nurhaliza, dan Budi Santoso berhasil meraih juara 1 dalam Kompetisi Business Plan Nasional 2026.\n\nKompetisi yang diikuti oleh 150 tim dari seluruh Indonesia ini menguji kemampuan mahasiswa dalam merancang business plan yang inovatif dan sustainable.\n\nTim IBI Kesatuan mengangkat tema 'Smart Farming Solution' yang menawarkan solusi pertanian modern berbasis IoT untuk meningkatkan produktivitas petani Indonesia.\n\nRektor IBI Kesatuan menyampaikan apresiasi tinggi atas prestasi ini dan berharap dapat memotivasi mahasiswa lain untuk terus berprestasi.",
                'category' => 'Prestasi',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Kunjungan Industri ke PT Telkom Indonesia',
                'slug' => 'kunjungan-industri-ke-pt-telkom-indonesia',
                'excerpt' => '50 mahasiswa IBI Kesatuan mengikuti kunjungan industri ke PT Telkom Indonesia untuk mempelajari transformasi digital perusahaan BUMN.',
                'content' => "Sebanyak 50 mahasiswa dari berbagai program studi di IBI Kesatuan mengikuti kunjungan industri ke PT Telkom Indonesia di Jakarta.\n\nKunjungan ini bertujuan untuk memberikan gambaran nyata tentang implementasi transformasi digital di perusahaan BUMN terbesar di Indonesia.\n\nMahasiswa berkesempatan melihat langsung data center, network operation center, dan berbagai inovasi teknologi yang dikembangkan Telkom.\n\nAcara ditutup dengan sesi tanya jawab bersama para profesional Telkom yang memberikan insight tentang peluang karir di industri telekomunikasi.",
                'category' => 'Kegiatan',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Workshop Digital Marketing bersama Google',
                'slug' => 'workshop-digital-marketing-bersama-google',
                'excerpt' => 'CDC IBI Kesatuan mengadakan workshop digital marketing dengan narasumber dari Google Indonesia untuk meningkatkan skill mahasiswa.',
                'content' => "Career Development Center IBI Kesatuan berhasil menghadirkan praktisi dari Google Indonesia dalam workshop Digital Marketing yang diikuti 100 peserta.\n\nWorkshop ini membahas berbagai topik mulai dari Google Ads, SEO, Google Analytics, hingga strategi content marketing yang efektif.\n\nPeserta mendapatkan sertifikat dari Google dan kesempatan untuk mengikuti program Google Digital Garage.\n\nKegiatan ini merupakan bagian dari upaya CDC untuk membekali mahasiswa dengan skill yang relevan dengan kebutuhan industri.",
                'category' => 'Workshop',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Alumni IBI Berbagi Pengalaman Berkarier di Startup',
                'slug' => 'alumni-ibi-berbagi-pengalaman-berkarier-di-startup',
                'excerpt' => 'Alumni IBI Kesatuan yang kini menjadi Product Manager di unicorn startup berbagi tips dan pengalaman berkarier di industri teknologi.',
                'content' => "Rudi Hartono, alumni IBI Kesatuan angkatan 2020 yang kini menjadi Product Manager di salah satu unicorn startup Indonesia, berbagi pengalaman kariernya.\n\nDalam sharing session yang dihadiri 80 mahasiswa, Rudi menceritakan perjalanan kariernya dari fresh graduate hingga mencapai posisi saat ini.\n\nRudi menekankan pentingnya continuous learning, networking, dan berani mengambil tantangan baru dalam membangun karier.\n\nSesi ini memberikan inspirasi bagi mahasiswa untuk tidak takut mencoba peluang di industri startup yang dinamis.",
                'category' => 'Alumni',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Seminar Nasional: Transformasi Digital di Era 5.0',
                'slug' => 'seminar-nasional-transformasi-digital-di-era-50',
                'excerpt' => 'IBI Kesatuan menyelenggarakan seminar nasional dengan tema Transformasi Digital di Era Society 5.0 yang dihadiri 300 peserta.',
                'content' => "Seminar Nasional Transformasi Digital di Era Society 5.0 sukses diselenggarakan dengan menghadirkan pembicara dari akademisi dan praktisi industri.\n\nProf. Dr. Budi Rahardjo dari ITB dan CEO PT Digital Indonesia menjadi keynote speaker yang membahas tantangan dan peluang di era digital.\n\nSeminar ini juga menghadirkan panel diskusi tentang skill yang dibutuhkan untuk menghadapi revolusi industri 4.0 menuju society 5.0.\n\nPeserta dari berbagai universitas di Jabodetabek antusias mengikuti seminar dan mendapatkan insight berharga tentang masa depan dunia kerja.",
                'category' => 'Seminar',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Peluncuran Program Magang Bersertifikat',
                'slug' => 'peluncuran-program-magang-bersertifikat',
                'excerpt' => 'CDC IBI Kesatuan meluncurkan program magang bersertifikat dengan 20 perusahaan partner untuk memberikan pengalaman kerja nyata bagi mahasiswa.',
                'content' => "Career Development Center IBI Kesatuan resmi meluncurkan Program Magang Bersertifikat yang bekerja sama dengan 20 perusahaan partner.\n\nProgram ini memberikan kesempatan bagi mahasiswa semester 6-7 untuk magang selama 3-6 bulan di perusahaan-perusahaan terkemuka.\n\nSetiap peserta akan mendapatkan bimbingan dari mentor profesional dan sertifikat resmi setelah menyelesaikan program.\n\nPendaftaran dibuka mulai hari ini dan mahasiswa dapat memilih bidang magang sesuai dengan minat dan jurusan masing-masing.",
                'category' => 'Program',
                'author_id' => $cdcAdmin->id,
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
        ];

        foreach ($news as $newsData) {
            CdcNews::create($newsData);
        }

        $this->command->info('✓ Created ' . count($news) . ' news articles');
    }
}
