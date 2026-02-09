<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cdc\StoreJobListingRequest;
use App\Http\Requests\Cdc\UpdateJobListingRequest;
use App\Models\CdcJobListing;
use App\Services\Cdc\CdcJobService;
use Illuminate\Http\Request;

/**
 * CDC Job Listing Controller
 * 
 * Handles CRUD operations for job listings in CDC admin panel
 */
class CdcJobController extends Controller
{
    public function __construct(
        private CdcJobService $jobService
    ) {}

    /**
     * Display a listing of job postings
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->get('search'),
            'type' => $request->get('type'),
            'is_active' => $request->get('is_active'),
            'admin' => true, // Show all including inactive
        ];

        $jobs = $this->jobService->getPaginated($filters, 15);

        return view('cdc.admin.jobs.index', compact('jobs', 'filters'));
    }

    /**
     * Show the form for creating a new job listing
     */
    public function create()
    {
        return view('cdc.admin.jobs.create');
    }

    /**
     * Store a newly created job listing
     */
    public function store(StoreJobListingRequest $request)
    {
        try {
            $this->jobService->create($request->validated());

            return redirect()
                ->route('cdc.admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan lowongan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified job listing
     */
    public function edit(CdcJobListing $job)
    {
        return view('cdc.admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job listing
     */
    public function update(UpdateJobListingRequest $request, CdcJobListing $job)
    {
        try {
            $this->jobService->update($job, $request->validated());

            return redirect()
                ->route('cdc.admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil diupdate!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengupdate lowongan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified job listing
     */
    public function destroy(CdcJobListing $job)
    {
        try {
            $this->jobService->delete($job);

            return redirect()
                ->route('cdc.admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus lowongan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status of job listing
     */
    public function toggleActive(CdcJobListing $job)
    {
        try {
            $this->jobService->toggleActive($job);

            return back()->with('success', 'Status lowongan berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status: ' . $e->getMessage());
        }
    }
}
