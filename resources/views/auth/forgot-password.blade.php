<x-guest-layout>
    <div class="mb-6">
        <span class="section-badge">Password</span>
        <h2 class="text-2xl font-black mt-3">Forgot Password</h2>
        <p class="text-slate-500 text-sm mt-1">Enter your email and we will send a reset link.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input id="email" class="admin-input mb-4 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        @error('email')<div class="text-red-600 text-xs mt-1 mb-3">{{ $message }}</div>@enderror
        <div class="text-right">
            <button class="px-5 py-2.5 rounded-xl font-extrabold text-sm bg-[var(--brand-navy)] text-white border-none cursor-pointer hover:bg-[var(--brand-navy-light)] transition-all duration-250">Email Password Reset Link</button>
        </div>
    </form>
</x-guest-layout>