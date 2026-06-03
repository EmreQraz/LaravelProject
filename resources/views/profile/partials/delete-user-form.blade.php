<section>
    <div class="danger-box">
        <h3 style="color: #991b1b; margin-bottom: 10px;">Delete Account</h3>

        <p style="color: #7f1d1d; margin-bottom: 18px;">
            Once your account is deleted, all related account data may be permanently removed.
            Please enter your password to confirm this action.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <p>
                <label>Password</label>
                <input type="password" name="password" required>
            </p>

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">
                Delete Account
            </button>
        </form>
    </div>
</section>
