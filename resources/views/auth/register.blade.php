<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-6">
            <span class="section-badge">Start here</span>
            <h2 class="text-2xl font-black mt-3">Create Account</h2>
            <p class="text-slate-500 text-sm mt-1">Set up your account once, then book services and track every request from your dashboard.</p>
        </div>

        <div class="mb-4">
            <label for="name" class="block font-bold text-sm mb-1.5">Full Name</label>
            <input id="name" class="admin-input @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required placeholder="Your name">
            @error('name')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold text-sm mb-1.5">Email Address</label>
            <input id="email" class="admin-input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com">
            @error('email')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold text-sm mb-1.5">Password</label>
            <input id="password" class="admin-input @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Create a password">
            @error('password')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="block font-bold text-sm mb-1.5">Confirm Password</label>
            <input id="password_confirmation" class="admin-input @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required placeholder="Confirm your password">
            @error('password_confirmation')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="flex items-center justify-between gap-4">
            <a class="text-sm font-semibold text-slate-500 no-underline hover:text-teal-700 transition-colors" href="{{ route('login') }}">Already registered?</a>
            <button class="px-5 py-2.5 rounded-xl font-extrabold text-sm bg-[var(--brand-navy)] text-white border-none cursor-pointer hover:bg-[var(--brand-navy-light)] transition-all duration-250">Register</button>
        </div>

        <div class="mt-6 pt-4 border-t border-slate-100 text-center text-sm">
            <span class="text-slate-500">Already have an account?</span>
            <a href="{{ route('login') }}" class="font-bold text-teal-700 no-underline hover:text-teal-800 ml-1">Log in</a>
        </div>
    </form>
</x-guest-layout>