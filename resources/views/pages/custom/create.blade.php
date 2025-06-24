@extends('layouts.admin.master')
@section('title', 'Custom Create')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Create Custom</h3>
                <div>
                    <a href="/admin/custom" class="btn btn-primary">Back to Custom</a>
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
            <form action="/admin/custom/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <div class="card custom-card shadow-sm">
                                <div class="card-body">
                                    Icon (1080px X 1080px)
                                    <input type="file" class="form-control" name="icon" id="imageInput"
                                        accept="image/png, image/jpeg, image/gif">
            
                                    @error('icon')
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
                        <div class="form-group mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter custom name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="reset" class="btn btn-info">X Reset Form</button>
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fa fa-save me-2"></i> Save Custom
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
    
            // Check if there was a previous upload attempt
            const oldIcon = @json(old('icon_preview'));
            if (oldIcon) {
                previewIcon.src = oldIcon;
                previewContainer.style.display = "block";
            }
    
            imageInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewIcon.src = e.target.result;
                        previewContainer.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                }
            });
    
            removeIconBtn.addEventListener("click", function() {
                imageInput.value = "";
                previewIcon.src = "";
                previewContainer.style.display = "none";
            });
        });
    </script>

@endsection
