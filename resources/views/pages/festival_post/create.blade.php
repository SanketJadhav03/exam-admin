@extends('layouts.admin.master')
@section('title', 'Festival Create')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Create Festival POst</h3>
                <div>
                    <a href="/admin/festival_post" class="btn btn-primary">Back to Festival Post</a>
                </div>
            </div>
            <div class="card-body ">
                @if (session('danger'))
                    <div class="justify-content-center d-flex  ">
                        <div class="alert alert-danger text-center mx-4 w-50 ">
                            {{ session('danger') }}
                        </div>
                    </div>
                @endif
                <form action="/admin/festival_post/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <div class="card custom-card shadow-sm">

                                    <div class="card-body ">
                                        Post Image ( 1080px X 1080px )
                                        <input type="file" class="form-control" name="post_image" id="imageInput"
                                            accept="image/png, image/jpeg, image/gif">

                                        @error('post_image')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror

                                        <!-- Preview Box -->
                                        <div id="previewContainer" class="mt-4 text-center" style="display: none;">
                                            <img id="previewIcon" class="img-thumbnail shadow"
                                                style="max-height: 200px; border-radius: 10px;" alt="Preview">
                                            <br>
                                            <button type="button" id="removeIconBtn"
                                                class="btn btn-outline-danger btn-sm mt-3">
                                                <i class="fa fa-trash me-1"></i> Remove Icon
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" -group mb-3">
                                <label class="form-label">Select Festival </label>
                                <select id="select2Basic" class="select2 form-select form-select-lg"
                                    data-allow-clear="true" name="festival_id">
                                    <option value="">Select Festival</option>
                                    @foreach ($festivals as $festival)
                                        <option value="{{ $festival->id }}">{{ $festival->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class=" -group mb-3">
                                <label class="form-label">Select Language </label>
                                <select id="select2Basic" class="select2 form-select form-select-lg"
                                    data-allow-clear="true" name="language_id">
                                    <option value="">Select Language</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Paid / Free</label>
                                <select class="form-control" name="paid" required>
                                    <option value="1">Free</option>
                                    <option value="2">Paid</option>
                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info"> X Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2"> <i class="fa fa-save me-2"></i> Save
                            Festival Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById("imageInput");
            const previewContainer = document.getElementById("previewContainer");
            const previewIcon = document.getElementById("previewIcon");
            const removeIconBtn = document.getElementById("removeIconBtn");

            imageInput.addEventListener("change", function() {
                const file = this.files[0];

                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewIcon.src = e.target.result;
                        previewContainer.style.display = "block";
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = "none";
                    previewIcon.src = "#";
                }
            });

            removeIconBtn.addEventListener("click", function() {
                imageInput.value = "";
                previewIcon.src = "#";
                previewContainer.style.display = "none";
            });
        });
    </script>

@endsection
