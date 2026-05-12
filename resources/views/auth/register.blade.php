<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="auth-form-heading">
            <span class="section-badge">Start here</span>
            <h2>Create Account</h2>
            <p>Set up your account once, then book services and track every request from your dashboard.</p>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input id="name" class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required placeholder="Your name">
            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com">
            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" class="form-control form-control-lg" type="password" name="password" required placeholder="Create a password">
            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
            <input id="password_confirmation" class="form-control form-control-lg" type="password" name="password_confirmation" required placeholder="Confirm your password">
            @error('password_confirmation')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="auth-form-actions">
            <a class="small auth-muted-link" href="{{ route('login') }}">Already registered?</a>
            <button class="btn btn-dark btn-lg">Register</button>
        </div>

        <div class="auth-switch">
            Already have an account?
            <a href="{{ route('login') }}">Log in</a>
        </div>
    </form>
</x-guest-layout>
