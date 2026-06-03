<section>
    @if(session('status') === 'profile-updated')
        <div class="success-message">
            Profile information updated successfully.
        </div>
    @endif

    @if($errors->any())
        <div class="error-message">
            Please check the form fields and try again.
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <p>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required>
        </p>

        <p>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
        </p>

        <button type="submit" class="btn">
            Save Profile
        </button>
    </form>
</section>
