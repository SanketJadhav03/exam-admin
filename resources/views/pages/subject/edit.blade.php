@extends('layouts.admin.master')
@section('title', 'Subject Edit')
@section('content')
    <div class="main-content app-content">
        <div class="main-container container-fluid">
            <div class="card mt-1">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Subject</h3>
                    <a href="/admin/festival" class="btn btn-primary">Back to Subject</a>
                </div>
                <div class="card-body">
                    <form action="{{route('subject.update',$subject->subject_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <div class="card custom-card">
                                      
                                        <div class="card-body">
                                            <div class="card-body">
                                                Image ( 1080px X 1080px ) 
                                                <input type="file" class="form-control" name="image" id="imageInput"
                                                    accept="image/png, image/jpeg, image/gif">

                                                @error('image')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror

                                                <!-- Preview Section -->
                                                <div id="previewContainer" class="mt-3 text-center"
                                                    style="{{ $subject->image ? '' : 'display:none;' }}">
                                                    <img id="previewImage"
                                                        src="{{ $subject->image ? asset('uploads/subjects/' . $subject->image) : '#' }}"
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
                                    <input type="hidden" class="form-control" name="id" value="{{ $subject->subject_id }}"
                                        placeholder="Enter festival name" required>
                                    <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}"
                                        placeholder="Enter festival name" required>
                                    @error('subject_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                               
            
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Subject</button>
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
