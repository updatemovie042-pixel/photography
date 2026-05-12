<x-guest-layout>
    <p class="text-muted mb-3">Enter your email and we will send a reset link.</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input id="email" class="form-control mb-3" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        <div class="text-end">
            <button class="btn btn-dark">Email Password Reset Link</button>
        </div>
    </form>
</x-guest-layout>
