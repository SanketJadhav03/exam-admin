@extends('layouts.admin.master')
@section('title', 'Category Edit')
@section('content')
    <div class="main-content app-content">
        <div class="main-container container-fluid">
            <div class="card mt-1">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Syllabus</h3>
                    <a href="{{route('syllabus.index')}}" class="btn btn-primary">Back to Syllabus</a>
                </div>
                <div class="card-body">
                   
                    <form action="{{route('syllabus.update', $syllabus->syallabus_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Syllabus Name</label>
                                    
                                    <input type="text" class="form-control" name="syllabus_name" value="{{ $syllabus->syllabus_name }}"
                                        placeholder="Enter Syllabus name" required>
                                    @error('syllabus_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="syllabus_status" required>
                                        <option value="1" {{ $syllabus->syllabus_status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $syllabus->syllabus_status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Syllabus</button>
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
