<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\HireRequest;

class HireController extends Controller
{
    /**
     * Show the hire form — GET /freelancers/{id}/hire
     */
    public function form($id)
    {
        $freelancer = Freelancer::findOrFail($id);

        return view('hire.form', compact('freelancer'));
    }

    /**
     * Handle hire form submission — POST /freelancers/{id}/hire
     */
    public function submit(Request $request, $id)
    {
        $freelancer = Freelancer::findOrFail($id);

        // Validate form inputs
        $validated = $request->validate([
            'job_title'   => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'duration'    => 'required|string|max:100',
            'hours'       => 'required|numeric|min:1|max:1000',
        ]);

        // AI: "Calculate total payment amount based on freelancer hourly rate multiplied by estimated hours"
        $totalAmount = $freelancer->hourly_rate * $validated['hours'];

        // Save hire request to DB with status = pending
        $hireRequest = HireRequest::create([
            'freelancer_id' => $freelancer->id,
            'job_title'     => $validated['job_title'],
            'description'   => $validated['description'],
            'duration'      => $validated['duration'],
            'total_amount'  => $totalAmount,
            'status'        => 'pending',
        ]);

        // Redirect to confirmation page
        return redirect()->route('hire.confirm', $hireRequest->id);
    }

    /**
     * Show payment confirmation page — GET /hire/{id}/confirm
     */
    public function confirm($id)
    {
        // Load hire request with its freelancer
        $hireRequest = HireRequest::with('freelancer')->findOrFail($id);

        // Prevent re-confirming already paid requests
        if ($hireRequest->status === 'paid') {
            return redirect()->route('freelancers.index')
                             ->with('info', 'This hire request has already been paid.');
        }

        return view('hire.confirm', compact('hireRequest'));
    }

    /**
     * Mark hire request as paid — POST /hire/{id}/confirm
     */
    public function markPaid($id)
    {
        $hireRequest = HireRequest::with('freelancer')->findOrFail($id);

        // Update status to paid in DB
        $hireRequest->update(['status' => 'paid']);

        // Pass data to success view
        return view('hire.success', compact('hireRequest'));
    }
}