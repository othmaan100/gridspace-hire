@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Browse Freelancers</h1>
    <p class="text-gray-500 mt-1">Find skilled professionals ready to work remotely</p>
</div>

{{-- Search & Filter Bar --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-8">
    <form method="GET" action="{{ route('freelancers.index') }}"
          class="flex flex-wrap gap-3 items-end">

        {{-- Search --}}
        <div class="flex-1 min-w-[200px]">
            <label class="block text-xs font-medium text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Name or job title..."
                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        {{-- Skill Filter --}}
        <div class="min-w-[160px]">
            <label class="block text-xs font-medium text-gray-500 mb-1">Skill</label>
            <input type="text" name="skill" value="{{ request('skill') }}"
                   placeholder="e.g. Laravel, React..."
                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        {{-- Sort --}}
        <div class="min-w-[160px]">
            <label class="block text-xs font-medium text-gray-500 mb-1">Sort By</label>
            <select name="sort"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
                <option value="rating"    {{ request('sort') == 'rating'    ? 'selected' : '' }}>Top Rated</option>
                <option value="rate_low"  {{ request('sort') == 'rate_low'  ? 'selected' : '' }}>Rate: Low to High</option>
                <option value="rate_high" {{ request('sort') == 'rate_high' ? 'selected' : '' }}>Rate: High to Low</option>
                <option value="jobs"      {{ request('sort') == 'jobs'      ? 'selected' : '' }}>Most Jobs Done</option>
            </select>
        </div>

        {{-- Buttons --}}
        <div class="flex gap-2">
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                Search
            </button>
            <a href="{{ route('freelancers.index') }}"
               class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                Clear
            </a>
        </div>
    </form>
</div>

{{-- Results Count --}}
<p class="text-sm text-gray-500 mb-4">
    Showing {{ $freelancers->total() }} freelancer{{ $freelancers->total() != 1 ? 's' : '' }}
</p>

{{-- Freelancer Cards Grid --}}
@if($freelancers->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($freelancers as $freelancer)
            <a href="{{ route('freelancers.show', $freelancer->id) }}"
               class="bg-white rounded-xl shadow-sm border border-gray-100 p-6
                      hover:shadow-md hover:border-indigo-200 transition-all duration-200 block">

                {{-- Avatar + Name --}}
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ $freelancer->avatar ?? 'https://i.pravatar.cc/150?img=' . $freelancer->id }}"
                         alt="{{ $freelancer->name }}"
                         class="w-14 h-14 rounded-full object-cover border-2 border-indigo-100">
                    <div>
                        <h2 class="font-semibold text-gray-900">{{ $freelancer->name }}</h2>
                        <p class="text-sm text-indigo-600">{{ $freelancer->title }}</p>
                    </div>
                </div>

                {{-- Rating + Rate --}}
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-1 text-yellow-500 text-sm font-medium">
                        ⭐ {{ number_format($freelancer->rating, 1) }}
                        <span class="text-gray-400 font-normal">/ 5.0</span>
                    </div>
                    <span class="text-green-600 font-semibold text-sm">
                        ${{ number_format($freelancer->hourly_rate, 0) }}/hr
                    </span>
                </div>

                {{-- Bio --}}
                <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                    {{ $freelancer->bio }}
                </p>

                {{-- Skills --}}
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(array_slice($freelancer->skills, 0, 3) as $skill)
                        <span class="bg-indigo-50 text-indigo-700 text-xs px-2 py-1 rounded-full">
                            {{ $skill }}
                        </span>
                    @endforeach
                    @if(count($freelancer->skills) > 3)
                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full">
                            +{{ count($freelancer->skills) - 3 }} more
                        </span>
                    @endif
                </div>

                {{-- Jobs Completed --}}
                <div class="text-xs text-gray-400 border-t border-gray-100 pt-3">
                    ✅ {{ $freelancer->jobs_completed }} jobs completed
                </div>

            </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $freelancers->appends(request()->query())->links() }}
    </div>

@else
    {{-- Empty State --}}
    <div class="text-center py-20 text-gray-400">
        <div class="text-5xl mb-4">🔍</div>
        <p class="text-lg font-medium">No freelancers found</p>
        <p class="text-sm mt-1">Try a different search or clear the filters</p>
        <a href="{{ route('freelancers.index') }}"
           class="inline-block mt-4 text-indigo-600 hover:underline text-sm">
            Clear filters
        </a>
    </div>
@endif

@endsection