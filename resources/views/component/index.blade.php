@extends('layouts.admin.master')
@section('title', 'Custom Post')
@section('content')
    <div class="main-content app-content">
        <div class="modal fade" id="newProjectModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0);">
                            <div class="form-group mb-3">
                                <label class="form-label">Project Name:</label>
                                <input type="text" class="form-control" placeholder="Enter project name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Project Descripttion:</label>
                                <input type="text" class="form-control" placeholder="Description...">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Rank:</label>
                                <input type="number" class="form-control" placeholder="Rank your project">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Budget:</label>
                                <input type="number" class="form-control" placeholder="Budget amount">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Deadline:</label>
                                <div class="input-group">
                                    <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                    <input type="text" class="form-control" id="date" placeholder="Choose date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Team:</label>
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0);" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        <a href="javascript:void(0);" class="btn btn-primary">Save Changes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container container-fluid">
            <div class="card"> 
                    <div class="card-header">
                        <div class="flex-grow-1 align-items-center d-flex ">
                            <h3 class=" ">Custom Post</h4>
                        </div>
                        <div class="min-w-fit-content d-flex align-items-center">
                            <div class="flex-grow-1 ">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search any project...">
                                    <a href="javascript:void(0);" class="btn bg-primary-transparent"><i
                                            class="ti ti-search"></i></a>
                                </div>
                            </div>
                            <div class="vr mx-3"></div>
                            <div class="flex-grow-1 ">
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#newProjectModal"><i class="fe fe-briefcase me-1"></i> Create New </a>
                            </div>
                        </div>
                    </div> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch" checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch" checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch"
                                                    checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch"
                                                    checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch"
                                                    checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-md-12">
                            <div class="card card-blog-overlay1 border-0 overflow-hidden">
                                <div class="card-body text-center position-relative"
                                    style="background-image: url('{{ asset('posts.jpg') }}');
                                   background-size: cover;
                                   background-position: center;
                                   background-repeat: no-repeat;
                                   min-height: 300px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   flex-direction: column;">

                                    <!-- Dark overlay for better text visibility -->
                                    <div
                                        style="position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        background-color: rgba(0,0,0,0.4);">
                                    </div>

                                    <!-- Action Icons (Top Right) -->
                                    <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                        <a href="javascript:void(0);" class="text-white me-2" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-white" title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </a>
                                    </div>

                                    <!-- Main Content -->
                                    <div class="position-relative z-index-1 p-3 w-100">
                                        <h3 class="mt-2 mb-2 text-white">Liam Nolan</h3>
                                        <p class="text-white">Web Designer</p>

                                        <!-- Follow/Edit Buttons -->
                                        <div class="btn-list mb-3">
                                            <button class="btn btn-primary btn-sm">
                                                <span class="fa fa-twitter me-2"></span> <span>Follow</span>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                <span class="fa fa-pencil me-2"></span> <span>Edit profile</span>
                                            </a>
                                        </div>

                                        <!-- Toggle Switches -->
                                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                                            <!-- Enable/Disable Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enableSwitch"
                                                    checked>
                                                <label class="form-check-label text-white"
                                                    for="enableSwitch">Enabled</label>
                                            </div>

                                            <!-- Paid/Free Switch -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="paidSwitch">
                                                <label class="form-check-label text-white" for="paidSwitch">
                                                    <span class="text-white">Free</span>
                                                    <span class="text-white d-none">Paid</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript to handle switch labels (add this at bottom of your page) -->
                        <script>
                            document.getElementById('paidSwitch').addEventListener('change', function() {
                                const labels = this.nextElementSibling.querySelectorAll('span');
                                labels[0].classList.toggle('d-none');
                                labels[1].classList.toggle('d-none');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
