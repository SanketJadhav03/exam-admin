@extends('layouts.admin.master')
@section('title', 'Business Category Edit')
@section('content')
    <div class="main-content app-content">
        <div class="main-container container-fluid">
            <div class="card mt-1">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Business Sub Category</h3>
                    <a href="/admin/business_sub_category" class="btn btn-primary">Back to Business Sub Category</a>
                </div>
                <div class="card-body">

                    <form action="/admin/business_sub_category/update" method="POST" enctype="multipart/form-data">
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
                                                    style="{{ $business_sub_category->icon ? '' : 'display:none;' }}">
                                                    <img id="previewImage"
                                                        src="{{ $business_sub_category->icon ? asset('uploads/business_sub_category/' . $business_sub_category->icon) : '#' }}"
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
                                    <label class="form-label">Business Category</label>
                                    <select id="select2Basic" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="business_category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($business_categories as $category)
                                            <option {{ $category->id == $business_sub_category->business_category_id ? "selected":"" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ $business_sub_category->id }}" placeholder="Enter category name" required>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $business_sub_category->name }}" placeholder="Enter category name"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" {{ $business_sub_category->status == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ $business_sub_category->status == 0 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Business Sub Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById("imageInput");
            const previewImage = document.getElementById("previewImage");
            const previewContainer = document.getElementById("previewContainer");
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
