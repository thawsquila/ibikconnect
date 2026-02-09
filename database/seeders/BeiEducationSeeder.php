<?php

namespace Database\Seeders;

use App\Models\BeiEducation;
use Illuminate\Database\Seeder;

/**
 * BEI Education Seeder
 * 
 * Seeds educational content about capital market
 */
class BeiEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            [
                'title' => 'Apa itu Saham?',
                'content' => "Saham adalah surat berharga yang menunjukkan bagian kepemilikan atas suatu perusahaan. Ketika Anda membeli saham, Anda menjadi pemilik sebagian dari perusahaan tersebut.\n\nKeuntungan dari saham:\n1. Capital Gain - Keuntungan dari selisih harga jual dan beli\n2. Dividen - Pembagian keuntungan perusahaan kepada pemegang saham\n\nRisiko saham:\n1. Capital Loss - Kerugian jika harga saham turun\n2. Risiko likuidasi - Jika perusahaan bangkrut\n\nSebelum berinvestasi saham, penting untuk memahami profil risiko Anda dan melakukan riset mendalam tentang perusahaan yang akan dibeli sahamnya.",
            ],
            [
                'title' => 'Cara Membuka Rekening Saham',
                'content' => "Untuk mulai berinvestasi saham, Anda perlu membuka rekening saham melalui perusahaan sekuritas. Berikut langkah-langkahnya:\n\n1. Pilih Perusahaan Sekuritas\nPilih sekuritas yang terdaftar di OJK dan sesuai dengan kebutuhan Anda.\n\n2. Siapkan Dokumen\n- KTP\n- NPWP\n- Buku tabungan\n- Foto selfie dengan KTP\n\n3. Isi Formulir Pembukaan Rekening\nBisa dilakukan online atau datang langsung ke kantor sekuritas.\n\n4. Verifikasi Data\nProses verifikasi biasanya memakan waktu 1-3 hari kerja.\n\n5. Deposit Awal\nSetor dana minimal sesuai ketentuan sekuritas (biasanya Rp 100.000).\n\n6. Mulai Trading\nSetelah rekening aktif, Anda bisa mulai membeli saham melalui aplikasi trading.",
            ],
            [
                'title' => 'Analisis Fundamental vs Teknikal',
                'content' => "Dalam berinvestasi saham, ada dua pendekatan analisis utama:\n\nANALISIS FUNDAMENTAL\nMenganalisis kesehatan keuangan perusahaan melalui:\n- Laporan keuangan (neraca, laba rugi, arus kas)\n- Rasio keuangan (P/E ratio, ROE, DER, dll)\n- Prospek bisnis dan industri\n- Kualitas manajemen\n\nCocok untuk: Investor jangka panjang\n\nANALISIS TEKNIKAL\nMenganalisis pergerakan harga saham melalui:\n- Chart dan pola harga\n- Indikator teknikal (MA, RSI, MACD, dll)\n- Volume trading\n- Support dan resistance\n\nCocok untuk: Trader jangka pendek\n\nKedua analisis ini bisa dikombinasikan untuk hasil yang lebih optimal. Fundamental untuk memilih saham yang bagus, teknikal untuk timing entry dan exit.",
            ],
            [
                'title' => 'Diversifikasi Portofolio',
                'content' => "Diversifikasi adalah strategi menyebarkan investasi ke berbagai instrumen untuk mengurangi risiko. Prinsip: 'Don't put all your eggs in one basket'.\n\nCara Diversifikasi:\n\n1. Diversifikasi Sektor\nInvestasi di berbagai sektor (perbankan, teknologi, konsumer, dll)\n\n2. Diversifikasi Instrumen\nKombinasi saham, obligasi, reksa dana, emas\n\n3. Diversifikasi Geografis\nInvestasi di pasar domestik dan internasional\n\n4. Diversifikasi Waktu\nDollar Cost Averaging - investasi rutin dengan nominal tetap\n\nContoh Portofolio Seimbang:\n- 40% Saham blue chip\n- 30% Saham growth\n- 20% Obligasi\n- 10% Instrumen pasar uang\n\nSesuaikan dengan profil risiko dan tujuan investasi Anda.",
            ],
            [
                'title' => 'Risiko dan Manajemen Risiko',
                'content' => "Setiap investasi memiliki risiko. Yang penting adalah bagaimana mengelola risiko tersebut.\n\nJenis Risiko:\n1. Risiko Pasar - Fluktuasi harga karena kondisi pasar\n2. Risiko Likuiditas - Kesulitan menjual aset\n3. Risiko Perusahaan - Kinerja perusahaan menurun\n4. Risiko Sistemik - Krisis ekonomi global\n\nCara Mengelola Risiko:\n\n1. Kenali Profil Risiko Anda\n- Konservatif: Prioritas keamanan modal\n- Moderat: Seimbang antara return dan risiko\n- Agresif: Mengejar return tinggi\n\n2. Set Stop Loss\nTentukan batas kerugian maksimal yang bisa ditolerir\n\n3. Jangan Investasi dengan Uang Panas\nGunakan dana yang memang dialokasikan untuk investasi\n\n4. Terus Belajar\nUpdate pengetahuan tentang pasar dan instrumen investasi\n\n5. Konsultasi dengan Profesional\nJika perlu, gunakan jasa financial advisor",
            ],
        ];

        foreach ($educations as $educationData) {
            BeiEducation::create($educationData);
        }

        $this->command->info('✓ Created ' . count($educations) . ' BEI education contents');
    }
}
