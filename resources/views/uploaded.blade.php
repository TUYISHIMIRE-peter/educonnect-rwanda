@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-lg-4 col-md-4 mb-4"> <!-- col-lg-6 means two columns per row for large screens -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ $video->title }}</h4>
                    <p class="text-muted">{{ $video->description }}</p>
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="ratio ratio-16x9">
                                <video controls>
                                    <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

