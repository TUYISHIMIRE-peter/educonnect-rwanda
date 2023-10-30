@extends('layouts.app')

@section('pageTitle', 'community')

@section('content')
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
<form action="{{ route('videos.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Video Title:</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="description">Video Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="video">Choose a video file:</label>
        <input type="file" class="form-control-file" name="video" id="video" accept="video/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload Video</button>
</form>
</div>
</div>
</div>
</div>

            @endsection