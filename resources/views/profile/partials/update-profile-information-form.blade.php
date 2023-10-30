<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-lg font-medium text-dark">
                    Profile Information
                </h2>
                <p class="mt-1 text-sm text-dark">
                    Update your account's profile information and email address.
                </p>
            </div>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 text-dark">
                        Your email address is unverified.
                        <button form="send-verification" class="btn btn-link">
                            Click here to <a href="{{ route('verification.resend') }}">re-send the verification email</a>.
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-success">
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <button class="btn btn-primary">{{ __('Save') }}</button>
                @if (session('status') === 'profile-updated')
                    <p class="text-success">
                        Saved.
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
