@extends('layouts.app')

@section('content')

{{-- Back Link --}}
<a href="{{ route('freelancers.index') }}"
   class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:underline mb-6">
    ← Back to Freelancers
</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- LEFT: Profile Info --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-6">

            {{-- Avatar --}}
            <div class="text-center mb-6">
                <img src="{{ $freelancer->avatar ?? 'https://i.pravatar.cc/150?img=' . $freelancer->id }}"
                     alt="{{ $freelancer->name }}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-indigo-100 mx-auto mb-3">
                <h1 class="text-xl font-bold text-gray-900">{{ $freelancer->name }}</h1>
                <p class="text-indigo-600 text-sm">{{ $freelancer->title }}</p>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-2 text-center mb-6 border-t border-b border-gray-100 py-4">
                <div>
                    <p class="text-lg font-bold text-yellow-500">{{ number_format($freelancer->rating, 1) }}</p>
                    <p class="text-xs text-gray-400">Rating</p>
                </div>
                <div>
                    <p class="text-lg font-bold text-green-600">${{ number_format($freelancer->hourly_rate, 0) }}</p>
                    <p class="text-xs text-gray-400">Per Hour</p>
                </div>
                <div>
                    <p class="text-lg font-bold text-indigo-600">{{ $freelancer->jobs_completed }}</p>
                    <p class="text-xs text-gray-400">Jobs Done</p>
                </div>
            </div>

            {{-- Skills --}}
            <div class="mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Skills</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($freelancer->skills as $skill)
                        <span class="bg-indigo-50 text-indigo-700 text-xs px-2 py-1 rounded-full">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Hire Button --}}
            <a href="{{ route('hire.form', $freelancer->id) }}"
               class="block w-full text-center bg-indigo-600 text-white py-3 rounded-xl
                      font-semibold hover:bg-indigo-700 transition text-sm">
                Hire {{ $freelancer->name }}
            </a>
        </div>
    </div>

    {{-- RIGHT: Bio + Past Projects --}}
    <div class="lg:col-span-2 space-y-6">

        {{-- Bio --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-3">About</h2>
            <p class="text-gray-600 leading-relaxed">{{ $freelancer->bio }}</p>
        </div>

        {{-- Past Projects --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">
                Past Projects
                <span class="text-sm font-normal text-gray-400 ml-2">
                    ({{ $freelancer->projects->count() }} completed)
                </span>
            </h2>

            @if($freelancer->projects->count() > 0)
                <div class="space-y-4">
                    @foreach($freelancer->projects as $project)
                        <div class="border border-gray-100 rounded-lg p-4 hover:border-indigo-200 transition">
                            <div class="flex items-start justify-between gap-4 mb-2">
                                <h3 class="font-medium text-gray-900">{{ $project->title }}</h3>
                                <span class="text-green-600 font-semibold text-sm whitespace-nowrap">
                                    ${{ number_format($project->amount_earned, 0) }}
                                </span>
                            </div>
                            <p class="text-gray-500 text-sm mb-3">{{ $project->description }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>👤 {{ $project->client_name }}</span>
                                <span>📅 {{ $project->completed_at->format('M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400 text-sm">No past projects listed yet.</p>
            @endif
        </div>

    </div>
</div>

@endsection