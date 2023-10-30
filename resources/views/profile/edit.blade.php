@extends('layouts.app')

@section('pageTitle', 'profile')

@section('content')
<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Farmer Connect</a></li>
                                            <li class="breadcrumb-item active">Profile </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-10 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class="nav-item">
                                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    Change Profile
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                                   Change password
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                   delete Account
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="aboutme">
                                                <div class="table-responsive">
                                                @include('profile.partials.update-profile-information-form')
                                                </div>
    
                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->
    
                                            <div class="tab-pane show active" id="timeline">
    
                                                <!-- comment box -->
                                                <div class="border rounded mt-2 mb-3">
                                                @include('profile.partials.update-password-form')
                                            </div>
                                            </div>
                                            <!-- end timeline content-->
    
                                            <div class="tab-pane" id="settings">
                                            @include('profile.partials.delete-user-form')
                                            </div>
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->
            @endsection