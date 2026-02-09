<?php

namespace Database\Seeders;

use App\Models\CdcPartner;
use Illuminate\Database\Seeder;

/**
 * CDC Partner Seeder
 * 
 * Seeds partner/affiliate companies for CDC
 */
class CdcPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Bursa Efek Indonesia',
                'logo_path' => 'mitra/BEI.jpg',
                'website_url' => 'https://www.idx.co.id',
                'description' => 'Bursa Efek Indonesia adalah bursa saham terbesar di Indonesia',
                'type' => 'corporate',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Ikatan Akuntan Indonesia',
                'logo_path' => 'mitra/IAI-1.jpg',
                'website_url' => 'https://iaiglobal.or.id',
                'description' => 'Organisasi profesi akuntan di Indonesia',
                'type' => 'ngo',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'CPSSoft Accurate',
                'logo_path' => 'mitra/CPSSOFT-ACCURATE-4-1.jpg',
                'website_url' => 'https://accurate.id',
                'description' => 'Software akuntansi terpercaya di Indonesia',
                'type' => 'corporate',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Asia Pacific University',
                'logo_path' => 'mitra/AsiaPacificUniversityOfTechnologyInnovation.jpg',
                'website_url' => 'https://www.apu.edu.my',
                'description' => 'Universitas teknologi terkemuka di Asia Pasifik',
                'type' => 'education',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'TICMI',
                'logo_path' => 'mitra/TICMI.png',
                'website_url' => null,
                'description' => 'Technology and Innovation Center for Management Indonesia',
                'type' => 'education',
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partnerData) {
            CdcPartner::create($partnerData);
        }

        $this->command->info('✓ Created ' . count($partners) . ' CDC partners');
    }
}
