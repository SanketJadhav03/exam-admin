@extends('layouts.admin.master')
@section('title', 'Festival Create')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Create Festival</h3>
                <div>
                    <a href="/admin/festival" class="btn btn-primary">Back to Festivals</a>
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
                <form action="/admin/festival/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <div class="card custom-card shadow-sm">

                                    <div class="card-body ">
                                        Image ( 1080px X 1080px )
                                        <input type="file" class="form-control" name="image" id="imageInput"
                                            accept="image/png, image/jpeg, image/gif">

                                        @error('image')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror

                                        <!-- Preview Box -->
                                        <div id="previewContainer" class="mt-4 text-center" style="display: none;">
                                            <img id="previewImage" class="img-thumbnail shadow"
                                                style="max-height: 200px; border-radius: 10px;" alt="Preview">
                                            <br>
                                            <button type="button" id="removeImageBtn"
                                                class="btn btn-outline-danger btn-sm mt-3">
                                                <i class="fa fa-trash me-1"></i> Remove Image
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    placeholder="Enter festival name" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Festival Date</label>
                                <input type="date" value="{{ old('festival_date') }}" class="form-control"
                                    name="festival_date" placeholder="Enter festival name" required>
                                @error('festival_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Activation Date</label>
                                <input type="date" value="{{ old('activation_date') }}" class="form-control"
                                    name="activation_date" placeholder="Enter festival name" required>
                                @error('activation_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info"> X Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2"> <i class="fa fa-save me-2"></i> Save
                            Festival</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById("imageInput");
            const previewContainer = document.getElementById("previewContainer");
            const previewImage = document.getElementById("previewImage");
            const removeImageBtn = document.getElementById("removeImageBtn");

            imageInput.addEventListener("change", function() {
                const file = this.files[0];

                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = "block";
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = "none";
                    previewImage.src = "#";
                }
            });

            removeImageBtn.addEventListener("click", function() {
                imageInput.value = "";
                previewImage.src = "#";
                previewContainer.style.display = "none";
            });
        });
    </script>

@endsection
