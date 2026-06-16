@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="text-4xl mb-3">📋</div>
            <h1 class="text-2xl font-bold text-gray-900">Confirm Your Hire</h1>
            <p class="text-gray-500 text-sm mt-1">Review the details before confirming payment</p>
        </div>

        {{-- Freelancer Info --}}
        <div class="flex items-center gap-4 bg-gray-50 rounded-lg p-4 mb-6">
            <img src="{{ $hireRequest->freelancer->avatar ?? 'https://i.pravatar.cc/150?img=' . $hireRequest->freelancer->id }}"
                 alt="{{ $hireRequest->freelancer->name }}"
                 class="w-12 h-12 rounded-full object-cover border-2 border-indigo-100">
            <div>
                <p class="font-semibold text-gray-900">{{ $hireRequest->freelancer->name }}</p>
                <p class="text-sm text-gray-500">{{ $hireRequest->freelancer->title }}</p>
            </div>
        </div>

        {{-- Job Summary --}}
        <div class="space-y-3 mb-6">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Job Title</span>
                <span class="font-medium text-gray-900">{{ $hireRequest->job_title }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Duration</span>
                <span class="font-medium text-gray-900">{{ $hireRequest->duration }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Hourly Rate</span>
                <span class="font-medium text-gray-900">${{ number_format($hireRequest->freelancer->hourly_rate, 2) }}/hr</span>
            </div>
            <div class="border-t border-gray-100 pt-3 flex justify-between">
                <span class="font-semibold text-gray-900">Total Payment</span>
                <span class="font-bold text-green-600 text-lg">
                    ${{ number_format($hireRequest->total_amount, 2) }}
                </span>
            </div>
        </div>

        {{-- Description --}}
        <div class="bg-gray-50 rounded-lg p-4 mb-6 text-sm text-gray-600">
            <p class="font-medium text-gray-700 mb-1">Job Description</p>
            <p>{{ $hireRequest->description }}</p>
        </div>

        {{-- Confirm Button --}}
        <form method="POST" action="{{ route('hire.markPaid', $hireRequest->id) }}">
            @csrf
            <button type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded-xl font-semibold
                           hover:bg-green-700 transition text-sm">
                ✅ Confirm & Send Payment of ${{ number_format($hireRequest->total_amount, 2) }}
            </button>
        </form>

        {{-- Cancel --}}
        <a href="{{ route('freelancers.show', $hireRequest->freelancer->id) }}"
           class="block text-center mt-3 text-sm text-gray-400 hover:text-gray-600">
            Cancel and go back
        </a>

    </div>
</div>

@endsection