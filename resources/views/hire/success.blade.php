@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto text-center">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10">

        {{-- Success Icon --}}
        <div class="text-6xl mb-4">🎉</div>
        <h1 class="text-2xl font-bold text-gray-900 mb-2">You're all set!</h1>
        <p class="text-gray-500 text-sm mb-8">
            Payment has been sent to <strong>{{ $hireRequest->freelancer->name }}</strong>
        </p>

        {{-- Payment Summary Card --}}
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-8 text-left space-y-3">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Freelancer</span>
                <span class="font-medium">{{ $hireRequest->freelancer->name }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Job</span>
                <span class="font-medium">{{ $hireRequest->job_title }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Duration</span>
                <span class="font-medium">{{ $hireRequest->duration }}</span>
            </div>
            <div class="border-t border-green-200 pt-3 flex justify-between">
                <span class="font-semibold">Amount Paid</span>
                <span class="font-bold text-green-600 text-lg">
                    ${{ number_format($hireRequest->total_amount, 2) }}
                </span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Status</span>
                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">
                    ✅ PAID
                </span>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex flex-col gap-3">
            <a href="{{ route('freelancers.index') }}"
               class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold
                      hover:bg-indigo-700 transition text-sm">
                Browse More Freelancers
            </a>
            <a href="{{ route('freelancers.show', $hireRequest->freelancer->id) }}"
               class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold
                      hover:bg-gray-200 transition text-sm">
                View Freelancer Profile
            </a>
        </div>

    </div>
</div>

@endsection