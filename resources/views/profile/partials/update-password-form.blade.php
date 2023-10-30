<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-lg font-medium text-dark">
                    Update Password
                </h2>
                <p class="mt-1 text-sm text-dark">
                    Ensure your account is using a long, random password to stay secure.
                </p>
            </div>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="mt-6">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" autocomplete="current-password">
                @if ($errors->has('updatePassword.current_password'))
                    <div class="text-danger">{{ $errors->first('updatePassword.current_password') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                @if ($errors->has('updatePassword.password'))
                    <div class="text-danger">{{ $errors->first('updatePassword.password') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
                @if ($errors->has('updatePassword.password_confirmation'))
                    <div class="text-danger">{{ $errors->first('updatePassword.password_confirmation') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <button class="btn btn-primary">{{ __('Save') }}</button>
            </div>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success"
                >Saved.</p>
            @endif
        </form>
    </div>
</section>
