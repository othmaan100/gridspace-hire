@extends('layouts.app')

@section('content')

{{-- Back Link --}}
<a href="{{ route('freelancers.show', $freelancer->id) }}"
   class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:underline mb-6">
    ← Back to Profile
</a>

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">

        {{-- Header --}}
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-gray-100">
            <img src="{{ $freelancer->avatar ?? 'https://i.pravatar.cc/150?img=' . $freelancer->id }}"
                 alt="{{ $freelancer->name }}"
                 class="w-14 h-14 rounded-full object-cover border-2 border-indigo-100">
            <div>
                <h1 class="text-xl font-bold text-gray-900">Hire {{ $freelancer->name }}</h1>
                <p class="text-sm text-gray-500">{{ $freelancer->title }} •
                    <span class="text-green-600 font-medium">${{ number_format($freelancer->hourly_rate, 0) }}/hr</span>
                </p>
            </div>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('hire.submit', $freelancer->id) }}">
            @csrf

            {{-- Job Title --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Job Title <span class="text-red-500">*</span>
                </label>
                <input type="text" name="job_title" value="{{ old('job_title') }}"
                       placeholder="e.g. Build a REST API for our mobile app"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm
                              focus:outline-none focus:ring-2 focus:ring-indigo-300
                              @error('job_title') border-red-400 @enderror">
                @error('job_title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Job Description <span class="text-red-500">*</span>
                </label>
                <textarea name="description" rows="4"
                          placeholder="Describe what you need done, requirements, deliverables..."
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm
                                 focus:outline-none focus:ring-2 focus:ring-indigo-300
                                 @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Duration + Hours (side by side) --}}
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Duration <span class="text-red-500">*</span>
                    </label>
                    <select name="duration"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-300
                                   @error('duration') border-red-400 @enderror">
                        <option value="">Select duration</option>
                        <option value="Less than 1 week"  {{ old('duration') == 'Less than 1 week'  ? 'selected' : '' }}>Less than 1 week</option>
                        <option value="1-2 weeks"         {{ old('duration') == '1-2 weeks'         ? 'selected' : '' }}>1–2 weeks</option>
                        <option value="2-4 weeks"         {{ old('duration') == '2-4 weeks'         ? 'selected' : '' }}>2–4 weeks</option>
                        <option value="1-2 months"        {{ old('duration') == '1-2 months'        ? 'selected' : '' }}>1–2 months</option>
                        <option value="3+ months"         {{ old('duration') == '3+ months'         ? 'selected' : '' }}>3+ months</option>
                    </select>
                    @error('duration')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Estimated Hours <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="hours" value="{{ old('hours') }}"
                           placeholder="e.g. 40" min="1" max="1000"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-indigo-300
                                  @error('hours') border-red-400 @enderror">
                    @error('hours')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Live Payment Estimate --}}
            <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 mb-6 text-sm">
                <p class="text-indigo-700">
                    💡 Estimated total:
                    <strong id="estimate">Enter hours above to see estimate</strong>
                </p>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold
                           hover:bg-indigo-700 transition text-sm">
                Continue to Payment →
            </button>
        </form>
    </div>
</div>

{{-- Live Estimate Calculator --}}
<script>
    const hoursInput = document.querySelector('input[name="hours"]');
    const estimate   = document.getElementById('estimate');
    const rate       = {{ $freelancer->hourly_rate }};

    hoursInput.addEventListener('input', function () {
        const hours = parseFloat(this.value);
        if (hours > 0) {
            const total = (hours * rate).toLocaleString('en-US', {
                style: 'currency', currency: 'USD'
            });
            estimate.textContent = total;
        } else {
            estimate.textContent = 'Enter hours above to see estimate';
        }
    });
</script>

@endsection