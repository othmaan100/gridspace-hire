<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Freelancer;

class FreelancerController extends Controller
{
    /**
     * Show all freelancers — /freelancers
     * Supports search by name/title and filter by skill
     */
    public function index(Request $request)
    {
        $query = Freelancer::query();

        // Search by name or title
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        // Filter by skill
        if ($request->filled('skill')) {
            $query->where('skills', 'like', "%{$request->skill}%");
        }

        // Sort options
        $sort = $request->get('sort', 'rating');
        match($sort) {
            'rate_low'  => $query->orderBy('hourly_rate', 'asc'),
            'rate_high' => $query->orderBy('hourly_rate', 'desc'),
            'jobs'      => $query->orderBy('jobs_completed', 'desc'),
            default     => $query->orderBy('rating', 'desc'),
        };

        $freelancers = $query->paginate(9); // 9 per page (3x3 grid)

        return view('freelancers.index', compact('freelancers'));
    }

    /**
     * Show single freelancer profile — /freelancers/{id}
     */
    public function show($id)
    {
        // findOrFail shows 404 automatically if ID doesn't exist
        $freelancer = Freelancer::with('projects')->findOrFail($id);

        return view('freelancers.show', compact('freelancer'));
    }
}