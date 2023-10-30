@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Users listing</h5>
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-newSchool">New User</button>
                </div>

            </div>
            {{-- new school modal --}}


            <form action="{{ route('create-user') }}" method="post">
                @csrf
                <div class="modal fade" id="modal-newSchool">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ex: John">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Last name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="ex: Doe">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact</label>
                                    <input type="text" name="contact" class="form-control"
                                        placeholder="ex: 0798 123 456">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="ex: example@hotmail.com">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="ex: example@hotmail.com">
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save user</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </form>


        </div>
        <div class="card-body">
            {{-- all schools --}}
            @if (count($users) == 0)
                <div class="alert alert-info">
                    <strong>Info </strong>
                    <span>No school data found</span>
                </div>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Contact</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                <td>{{ strtolower($user->email) }}</td>
                                <td>{{ strtoupper($user->name) }}</td>
                                <td>{{ ucfirst($user->lname) }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button data-toggle="modal" data-target="#modal-update-school-{{ $user->id }}"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <span>&nbsp;&nbsp;</span>

                                        {{-- edit modal --}}
                                        <form action="{{ route('update-user', $user->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal fade" id="modal-update-school-{{ $user->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Create new user</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">First name</label>
                                                                <input value="{{ $user->name }}" type="text" name="name" class="form-control"
                                                                    placeholder="Ex: John">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Last name</label>
                                                                <input value="{{ $user->lname }}" type="text" name="lname" class="form-control"
                                                                    placeholder="ex: Doe">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Contact</label>
                                                                <input value="{{ $user->contact }}" type="text" name="contact" class="form-control"
                                                                    placeholder="ex: 0798 123 456">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Email</label>
                                                                <input value="{{ $user->email }}" type="text" name="email" class="form-control"
                                                                    placeholder="ex: example@hotmail.com">
                                                            </div>

                                                            
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </form>



                                        {{-- delete button --}}
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modal-delete-school-{{ $user->id }}">delete</button>
                                        {{-- delete comfirmation --}}
                                        <form action="{{ route('destroy-user', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal fade" id="modal-delete-school-{{ $user->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            Are you sure to delete {{ $user->name }} school?
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Deny</button>
                                                            <button type="submit" class="btn btn-primary">Yes
                                                                Delete</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
