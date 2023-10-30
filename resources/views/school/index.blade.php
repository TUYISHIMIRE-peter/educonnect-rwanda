@extends('layouts.app')

@section('pageTitle', 'Schools')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>School listing</h5>
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-newSchool">New School</button>
                </div>

            </div>
            {{-- new school modal --}}


            <form action="{{ route('school.store') }}" method="post">
                @csrf
                <div class="modal fade" id="modal-newSchool">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new school</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">School name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ex: TCT">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">School location</label>
                                    <input type="text" name="location" class="form-control" placeholder="ex: Rulindo">
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save school</button>
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
            @if (count($schools) == 0)
                <div class="alert alert-info">
                    <strong>Info </strong>
                    <span>No school data found</span>
                </div>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>School name</th>
                            <th>School location</th>
                            <th class="col-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($schools as $school)
                            <tr>
                                <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->location }}</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button data-toggle="modal"
                                            data-target="#modal-assignHeadTeacher-{{ $school->id }}"
                                            class="btn btn-success btn-sm">Register Head Teacher</button>
                                            {{-- hod modal --}}
                                            <form action="{{ route('create-user') }}" method="post">
                                                @csrf
                                                <div class="modal fade" id="modal-assignHeadTeacher-{{ $school->id }}">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Register Hod</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="form-group">
                                                        <input type="number" name="school_id" hidden value="{{ $school->id }}" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" name="name" class="form-control" required> @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" name="lname" class="form-control" required> @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" class="form-control" required> @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="number" name="contact" class="form-control" required> @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" name="password" class="form-control" required> @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                      </div>
                                                      <div class="mb-3">
                                                        <input type="password" name="role" value="Hod" hidden required>
                                                        @error('role')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                      <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Register</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>
                                            </form>
                                            {{-- edit button --}}
                                        <button data-toggle="modal" data-target="#modal-update-school-{{ $school->id }}"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <span>&nbsp;&nbsp;</span>

                                        {{-- edit modal --}}
                                        <form action="{{ route('school.update', $school->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal fade" id="modal-update-school-{{ $school->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Create new school</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">School name</label>
                                                                <input value="{{ $school->name }}" type="text"
                                                                    name="name" class="form-control"
                                                                    placeholder="Ex: TCT">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">School location</label>
                                                                <input value="{{ $school->location }}" type="text"
                                                                    name="location" class="form-control"
                                                                    placeholder="ex: Rulindo">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                school</button>
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
                                            data-target="#modal-delete-school-{{ $school->id }}">delete</button>
                                        {{-- delete comfirmation --}}
                                        <form action="{{ route('school.destroy', $school->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal fade" id="modal-delete-school-{{ $school->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            Are you sure to delete {{ $school->name }} school?
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
