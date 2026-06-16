<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gridspace — Find & Hire Freelancers</title>

    {{-- Tailwind CSS via CDN (no npm needed) --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('freelancers.index') }}"
               class="text-2xl font-bold text-indigo-600 tracking-tight">
                Gridspace
            </a>

            {{-- Right Side --}}
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <a href="{{ route('freelancers.index') }}"
                   class="hover:text-indigo-600 transition">Browse Freelancers</a>

                <span class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-medium">
                    Employer View
                </span>

                @auth
                    {{-- Logged in: show user + logout --}}
                    <span class="text-gray-500">👤 {{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-xs
                                       font-medium hover:bg-red-100 transition">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Guest: show login + register --}}
                    <a href="{{ route('login') }}"
                       class="text-indigo-600 hover:underline text-sm">Login</a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-3 py-1.5 rounded-lg text-xs
                              font-medium hover:bg-indigo-700 transition">
                        Register
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('info'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg">
                {{ session('info') }}
            </div>
        </div>
    @endif

    {{-- Page Content --}}
    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-16 border-t border-gray-200 bg-white py-6 text-center text-sm text-gray-400">
        © {{ date('Y') }} Gridspace. Built for remote work.
    </footer>

</body>
</html>