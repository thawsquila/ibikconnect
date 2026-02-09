<?php

namespace Database\Seeders;

use App\Models\CdcJobListing;
use Illuminate\Database\Seeder;

/**
 * CDC Job Listing Seeder
 * 
 * Seeds job listings with realistic data
 */
class CdcJobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Marketing Executive',
                'company_name' => 'PT Digital Nusantara',
                'location' => 'Jakarta',
                'type' => 'full-time',
                'salary_range' => 'Rp 5-7 jt',
                'description' => 'Kami mencari Marketing Executive yang berpengalaman untuk mengembangkan strategi pemasaran digital dan meningkatkan brand awareness perusahaan.',
                'requirements' => "- Minimal S1 Marketing/Komunikasi\n- Pengalaman 1-2 tahun di bidang marketing\n- Menguasai digital marketing tools\n- Kreatif dan inovatif",
                'benefits' => "- Gaji kompetitif\n- BPJS Kesehatan & Ketenagakerjaan\n- Bonus performa\n- Pelatihan berkala",
                'deadline' => now()->addDays(30),
                'is_active' => true,
            ],
            [
                'title' => 'Software Engineer',
                'company_name' => 'Tech Innovate Indonesia',
                'location' => 'Bogor',
                'type' => 'full-time',
                'salary_range' => 'Rp 8-12 jt',
                'description' => 'Bergabunglah dengan tim engineering kami untuk membangun aplikasi web dan mobile yang inovatif.',
                'requirements' => "- S1 Teknik Informatika/Sistem Informasi\n- Menguasai Laravel, React, atau Vue.js\n- Pengalaman dengan Git dan Agile\n- Problem solving yang baik",
                'benefits' => "- Gaji menarik\n- Remote working option\n- Laptop & peralatan kerja\n- Asuransi kesehatan",
                'deadline' => now()->addDays(45),
                'is_active' => true,
            ],
            [
                'title' => 'Graphic Designer',
                'company_name' => 'Creative Studio',
                'location' => 'Remote',
                'type' => 'freelance',
                'salary_range' => 'Rp 4-6 jt',
                'description' => 'Kami membutuhkan graphic designer freelance untuk project-based work dengan klien dari berbagai industri.',
                'requirements' => "- Portfolio design yang menarik\n- Menguasai Adobe Creative Suite\n- Kreatif dan detail oriented\n- Bisa bekerja dengan deadline",
                'benefits' => "- Flexible working hours\n- Project-based payment\n- Networking opportunities\n- Portfolio building",
                'deadline' => now()->addDays(20),
                'is_active' => true,
            ],
            [
                'title' => 'Data Analyst',
                'company_name' => 'Analytics Corp',
                'location' => 'Bandung',
                'type' => 'full-time',
                'salary_range' => 'Rp 6-9 jt',
                'description' => 'Posisi Data Analyst untuk menganalisis data bisnis dan memberikan insights untuk pengambilan keputusan strategis.',
                'requirements' => "- S1 Statistika/Matematika/Informatika\n- Menguasai SQL, Python, atau R\n- Pengalaman dengan data visualization tools\n- Analytical thinking yang kuat",
                'benefits' => "- Competitive salary\n- Health insurance\n- Training & certification\n- Career development",
                'deadline' => now()->addDays(35),
                'is_active' => true,
            ],
            [
                'title' => 'Content Writer',
                'company_name' => 'Media Group',
                'location' => 'Jakarta',
                'type' => 'part-time',
                'salary_range' => 'Rp 3-5 jt',
                'description' => 'Mencari content writer part-time untuk membuat artikel, blog post, dan konten media sosial yang engaging.',
                'requirements' => "- Minimal D3 semua jurusan\n- Kemampuan menulis yang baik\n- Kreatif dan up-to-date dengan tren\n- Portfolio tulisan",
                'benefits' => "- Flexible schedule\n- Work from home\n- Byline credit\n- Networking",
                'deadline' => now()->addDays(25),
                'is_active' => true,
            ],
            [
                'title' => 'Business Analyst',
                'company_name' => 'Consulting Partners',
                'location' => 'Surabaya',
                'type' => 'full-time',
                'salary_range' => 'Rp 7-10 jt',
                'description' => 'Business Analyst untuk menganalisis proses bisnis klien dan memberikan rekomendasi improvement.',
                'requirements' => "- S1 Manajemen/Ekonomi\n- Pengalaman 2+ tahun sebagai BA\n- Menguasai business process modeling\n- Excellent communication skills",
                'benefits' => "- Attractive salary\n- Project allowance\n- Health & life insurance\n- Professional development",
                'deadline' => now()->addDays(40),
                'is_active' => true,
            ],
            [
                'title' => 'Accounting Staff',
                'company_name' => 'PT Maju Bersama',
                'location' => 'Bogor',
                'type' => 'full-time',
                'salary_range' => 'Rp 4.5-6 jt',
                'description' => 'Dibutuhkan accounting staff untuk menangani pembukuan, laporan keuangan, dan administrasi perpajakan.',
                'requirements' => "- S1 Akuntansi\n- Fresh graduate welcome\n- Menguasai software akuntansi\n- Teliti dan detail oriented",
                'benefits' => "- Gaji sesuai UMR\n- BPJS\n- Bonus tahunan\n- Jenjang karir jelas",
                'deadline' => now()->addDays(30),
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Designer',
                'company_name' => 'Digital Agency',
                'location' => 'Jakarta',
                'type' => 'full-time',
                'salary_range' => 'Rp 7-10 jt',
                'description' => 'UI/UX Designer untuk merancang user interface dan user experience aplikasi mobile dan web.',
                'requirements' => "- S1 DKV/Desain Grafis\n- Portfolio UI/UX yang kuat\n- Menguasai Figma, Adobe XD\n- Memahami user-centered design",
                'benefits' => "- Competitive package\n- MacBook provided\n- Flexible hours\n- Creative environment",
                'deadline' => now()->addDays(35),
                'is_active' => true,
            ],
            [
                'title' => 'HR Intern',
                'company_name' => 'PT Sejahtera Abadi',
                'location' => 'Bogor',
                'type' => 'internship',
                'salary_range' => 'Rp 2-3 jt',
                'description' => 'Program magang 6 bulan di divisi Human Resources untuk mendapatkan pengalaman praktis di bidang HR.',
                'requirements' => "- Mahasiswa aktif semester 6-8\n- Jurusan Psikologi/Manajemen\n- Komunikatif dan proaktif\n- Bisa bekerja dalam tim",
                'benefits' => "- Uang saku bulanan\n- Sertifikat magang\n- Mentoring dari profesional\n- Kesempatan diangkat karyawan",
                'deadline' => now()->addDays(20),
                'is_active' => true,
            ],
            [
                'title' => 'Sales Representative',
                'company_name' => 'PT Sukses Mandiri',
                'location' => 'Jakarta',
                'type' => 'full-time',
                'salary_range' => 'Rp 5-8 jt + Komisi',
                'description' => 'Sales Representative untuk menjual produk software B2B kepada perusahaan-perusahaan di Indonesia.',
                'requirements' => "- Minimal D3 semua jurusan\n- Pengalaman sales 1+ tahun\n- Komunikasi persuasif\n- Target oriented",
                'benefits' => "- Base salary + komisi\n- Bonus achievement\n- Kendaraan operasional\n- Jenjang karir",
                'deadline' => now()->addDays(30),
                'is_active' => true,
            ],
        ];

        foreach ($jobs as $jobData) {
            CdcJobListing::create($jobData);
        }

        $this->command->info('✓ Created ' . count($jobs) . ' job listings');
    }
}
