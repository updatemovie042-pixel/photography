<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="auth-form-heading">
            <span class="section-badge">Welcome back</span>
            <h2>User Login</h2>
            <p>Continue to your booking dashboard and manage your photography requests.</p>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" class="form-control form-control-lg" type="password" name="password" required placeholder="Enter your password">
            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Remember me</label>
        </div>

        <div class="auth-form-actions">
            @if (Route::has('password.request'))
                <a class="small auth-muted-link" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            <button class="btn btn-dark btn-lg">Log in</button>
        </div>

        <div class="auth-switch">
            New to PhotoBooking?
            <a href="{{ route('register') }}">Create an account</a>
        </div>
    </form>
</x-guest-layout>
