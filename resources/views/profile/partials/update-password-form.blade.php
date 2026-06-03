<section>
    @if(session('status') === 'password-updated')
        <div class="success-message">
            Password updated successfully.
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <p>
            <label>Current Password</label>
            <input type="password" name="current_password" required>
        </p>

        <p>
            <label>New Password</label>
            <input type="password" name="password" required>
        </p>

        <p>
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" required>
        </p>

        <button type="submit" class="btn">
            Update Password
        </button>
    </form>
</section>
