<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-6">
            <span class="section-badge">Welcome back</span>
            <h2 class="text-2xl font-black mt-3">User Login</h2>
            <p class="text-slate-500 text-sm mt-1">Continue to your booking dashboard and manage your photography requests.</p>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold text-sm mb-1.5">Email Address</label>
            <input id="email" class="admin-input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
            @error('email')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold text-sm mb-1.5">Password</label>
            <input id="password" class="admin-input @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Enter your password">
            @error('password')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="flex items-center gap-2 mb-4">
            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-teal-700 focus:ring-teal-500" name="remember">
            <label for="remember_me" class="text-sm font-medium text-slate-600">Remember me</label>
        </div>

        <div class="flex items-center justify-between gap-4">
            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-slate-500 no-underline hover:text-teal-700 transition-colors" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            <button class="px-5 py-2.5 rounded-xl font-extrabold text-sm bg-[var(--brand-navy)] text-white border-none cursor-pointer hover:bg-[var(--brand-navy-light)] transition-all duration-250">Log in</button>
        </div>

        <div class="mt-6 pt-4 border-t border-slate-100 text-center text-sm">
            <span class="text-slate-500">New to PhotoBooking?</span>
            <a href="{{ route('register') }}" class="font-bold text-teal-700 no-underline hover:text-teal-800 ml-1">Create an account</a>
        </div>
    </form>
</x-guest-layout>