<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdcEvent;
use App\Models\CdcEventRegistration;
use App\Models\CdcJobListing;
use App\Models\CdcNews;
use App\Models\CdcPartner;
use Illuminate\Http\Request;

/**
 * CDC Admin Dashboard Controller
 * 
 * Handles the main dashboard for CDC admin with statistics and overview
 */
class CdcAdminController extends Controller
{
    /**
     * Display CDC admin dashboard with statistics
     */
    public function dashboard()
    {
        // Get statistics
        $stats = [
            'total_jobs' => CdcJobListing::count(),
            'active_jobs' => CdcJobListing::active()->count(),
            'total_events' => CdcEvent::count(),
            'upcoming_events' => CdcEvent::upcoming()->published()->count(),
            'total_news' => CdcNews::count(),
            'published_news' => CdcNews::published()->count(),
            'total_partners' => CdcPartner::count(),
            'active_partners' => CdcPartner::active()->count(),
            'total_registrations' => CdcEventRegistration::count(),
            'pending_registrations' => CdcEventRegistration::pending()->count(),
        ];

        // Get recent activities
        $recentJobs = CdcJobListing::latest()->limit(5)->get();
        $recentEvents = CdcEvent::latest('start_date')->limit(5)->get();
        $recentNews = CdcNews::latest()->limit(5)->get();
        $recentRegistrations = CdcEventRegistration::with('event')
            ->latest()
            ->limit(10)
            ->get();

        return view('cdc.admin.dashboard', compact(
            'stats',
            'recentJobs',
            'recentEvents',
            'recentNews',
            'recentRegistrations'
        ));
    }
}
