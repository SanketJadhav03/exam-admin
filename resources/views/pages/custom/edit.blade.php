@extends('layouts.admin.master')
@section('title', 'Custom Edit')
@section('content')
    <div class="main-content app-content">
        <div class="main-container container-fluid">
            <div class="card mt-1">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Custom</h3>
                    <a href="/admin/custom" class="btn btn-primary">Back to Custom</a>
                </div>
                <div class="card-body">
                   
                    <form action="/admin/custom/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <div class="card custom-card">
                                      
                                        <div class="card-body">
                                            <div class="card-body">
                                                Icon ( 1080px X 1080px ) 
                                                <input type="file" class="form-control" name="icon" id="imageInput"
                                                    accept="image/png, image/jpeg, image/gif">

                                                @error('icon')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror

                                                <!-- Preview Section -->
                                                <div id="previewContainer" class="mt-3 text-center"
                                                    style="{{ $custom->icon ? '' : 'display:none;' }}">
                                                    <img id="previewImage"
                                                        src="{{ $custom->icon ? asset('uploads/categories/' . $custom->icon) : '#' }}"
                                                        alt="Preview" class="img-thumbnail shadow"
                                                        style="max-height: 200px; border-radius: 10px;">
                                                    <br>
                                                    <button type="button" id="removeImageBtn"
                                                        class="btn btn-outline-danger btn-sm mt-2">
                                                        <i class="fa fa-trash me-1"></i> Remove Image
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="hidden" class="form-control" name="id" value="{{ $custom->id }}"
                                        placeholder="Enter custom name" required>
                                    <input type="text" class="form-control" name="name" value="{{ $custom->name }}"
                                        placeholder="Enter custom name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" {{ $custom->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $custom->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Custom</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const imageInput = document.getElementById("imageInput");
            const previewImage = document.getElementById("previewImage");
            const previewContainer = document.getElementById("previewContainer");
            const removeImageBtn = document.getElementById("removeImageBtn");

            imageInput.addEventListener("change", function () {
                const file = this.files[0];

                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = "block";
                    };

                    reader.readAsDataURL(file);
                }
            });

            removeImageBtn.addEventListener("click", function () {
                imageInput.value = "";
                previewImage.src = "#";
                previewContainer.style.display = "none";
            });
        });
    </script>
@endsection
