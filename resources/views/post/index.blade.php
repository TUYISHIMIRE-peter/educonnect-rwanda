@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Ask Question
            </button>
            <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createPostModalLabel">Ask Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
            
                            <form method="post" action="{{ route('post.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="label">Question:</label>
                                    <input type="text" name="title" class="form-control" required />
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Ask Question" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Questions</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('post.show',$post->slug) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Read Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection 