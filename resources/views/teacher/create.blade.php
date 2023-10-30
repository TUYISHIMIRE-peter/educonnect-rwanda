@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
