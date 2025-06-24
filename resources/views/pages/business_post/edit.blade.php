@extends('layouts.admin.master')
@section('title', 'Edit Business Post')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Business Post</h3>
                <div>
                    <a href="/admin/business_post" class="btn btn-primary">Back to Business Posts</a>
                </div>
            </div>
            <div class="card-body ">
                <form action="/admin/business_post/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $business_post->id }}">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <div class="card custom-card shadow-sm">
                                    <div class="card-body">
                                        Post Image (1080px X 1080px)
                                        <input type="file" class="form-control" name="post_image" id="imageInput"
                                            accept="image/png, image/jpeg, image/gif">
                                        
                                        @error('post_image')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror

                                        <!-- Preview Box -->
                                        <div id="previewContainer" class="mt-4 text-center">
                                            @if($business_post->post_image)
                                                <img id="previewIcon" src="{{ asset('uploads/business_post/' . $business_post->post_image) }}" 
                                                     class="img-thumbnail shadow" style="max-height: 200px; border-radius: 10px;" alt="Current Image">
                                            @else
                                                <img id="previewIcon" src="#" class="img-thumbnail shadow" 
                                                     style="max-height: 200px; border-radius: 10px; display: none;" alt="Preview">
                                            @endif
                                            <br>
                                            @if($business_post->post_image)
                                                <button type="button" id="removeIconBtn" class="btn btn-outline-danger btn-sm mt-3">
                                                    <i class="fa fa-trash me-1"></i> Remove Image
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Select Business Category</label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" name="business_category_id" required>
                                    <option value="">Select Business</option>
                                    @foreach ($business_categories as $business_category)
                                        <option value="{{ $business_category->id }}" {{ $business_post->business_category_id == $business_category->id ? 'selected' : '' }}>
                                            {{ $business_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Select Business Sub Category</label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" name="business_sub_category_id" required>
                                    <option value="">Select Language</option>
                                    @foreach ($business_sub_categories as $business_sub_category)
                                        <option value="{{ $business_sub_category->id }}" {{ $business_post->business_sub_category_id == $business_sub_category->id ? 'selected' : '' }}>
                                            {{ $business_sub_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="1" {{ $business_post->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="2" {{ $business_post->status == 2 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Paid / Free</label>
                                <select class="form-control" name="paid" required>
                                    <option value="1" {{ $business_post->paid == 1 ? 'selected' : '' }}>Free</option>
                                    <option value="2" {{ $business_post->paid == 2 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info">Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="fa fa-save me-2"></i> Update Business Post
                        </button>
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

            // Show preview when new image is selected
            imageInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewIcon.src = e.target.result;
                        previewIcon.style.display = "block";
                        if (!removeIconBtn) {
                            const removeBtn = document.createElement("button");
                            removeBtn.type = "button";
                            removeBtn.id = "removeIconBtn";
                            removeBtn.className = "btn btn-outline-danger btn-sm mt-3";
                            removeBtn.innerHTML = '<i class="fa fa-trash me-1"></i> Remove Image';
                            removeBtn.addEventListener("click", function() {
                                imageInput.value = "";
                                previewIcon.src = "#";
                                previewIcon.style.display = "none";
                                this.remove();
                            });
                            previewContainer.appendChild(removeBtn);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove image functionality
            if (removeIconBtn) {
                removeIconBtn.addEventListener("click", function() {
                    imageInput.value = "";
                    previewIcon.src = "#";
                    previewIcon.style.display = "none";
                    this.remove();
                });
            }
        });
    </script>
@endsection