@extends('layouts.app')

@section('pageTitle', 'Teachers')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Teachers list</h5>
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-newSchool">New School</button>
                </div>

            </div>
            {{-- new school modal --}}


            <form action="{{ route('Teacchers.store') }}" method="post">
                @csrf
                <div class="modal fade" id="modal-newSchool">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new users</h4>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($schools as $school)
                            <tr>
                                <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->location }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <span>&nbsp;&nbsp;</span>
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
