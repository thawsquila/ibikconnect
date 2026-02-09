<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdcJobListing;
use App\Models\CdcEvent;
use App\Models\CdcNews;
use App\Models\CdcEventRegistration;
use App\Models\BeiEvent;
use App\Models\BeiRegistration;
use App\Models\BeiEducation;
use App\Models\BeiGallery;

/**
 * Overview Controller
 * 
 * Displays overall statistics and summary for admin panel
 */
class OverviewController extends Controller
{
    /**
     * Display admin overview dashboard
     */
    public function index()
    {
        $user = auth()->user();

        // CDC Statistics
        $cdcStats = [
            'total_jobs' => CdcJobListing::count(),
            'active_jobs' => CdcJobListing::active()->count(),
            'total_events' => CdcEvent::count(),
            'upcoming_events' => CdcEvent::upcoming()->published()->count(),
            'total_news' => CdcNews::count(),
            'published_news' => CdcNews::published()->count(),
            'total_registrations' => CdcEventRegistration::count(),
            'pending_registrations' => CdcEventRegistration::pending()->count(),
        ];

        // BEI Statistics
        $beiStats = [
            'total_events' => BeiEvent::count(),
            'total_registrations' => BeiRegistration::count(),
            'total_educations' => BeiEducation::count(),
            'total_galleries' => BeiGallery::count(),
        ];

        // Recent Activities
        $recentCdcJobs = CdcJobListing::latest()->limit(5)->get();
        $recentCdcEvents = CdcEvent::latest('start_date')->limit(5)->get();
        $recentBeiEvents = BeiEvent::latest('starts_at')->limit(5)->get();
        $recentCdcNews = CdcNews::latest()->limit(5)->get();

        return view('admin.overview', compact(
            'cdcStats',
            'beiStats',
            'recentCdcJobs',
            'recentCdcEvents',
            'recentBeiEvents',
            'recentCdcNews'
        ));
    }
}
