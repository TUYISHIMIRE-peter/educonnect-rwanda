<section class="space-y-6">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-lg font-medium text-dark">
                    Delete Account
                </h2>
                <p class="mt-1 text-sm text-dark">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                </p>
            </div>
        </div>

        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">Delete Account</button>

        <div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="modal-header">
                            <h2 class="text-lg font-medium text-dark">
                                Are you sure you want to delete your account?
                            </h2>
                        </div>

                        <div class="modal-body">
                            <p class="mt-1 text-sm text-dark">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                            </p>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('userDeletion.password'))
                                    <div class="text-danger">{{ $errors->first('userDeletion.password') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
