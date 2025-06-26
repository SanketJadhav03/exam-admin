@extends('layouts.admin.master')
@section('title', 'Festival Create')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Create Subject Topic</h3>
                <div>
                    <a href="/admin/festival_post" class="btn btn-primary">Back to  Topic</a>
                </div>
            </div>
            <div class="card-body ">
                 @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
                @if (session('danger'))
                    <div class="justify-content-center d-flex  ">
                        <div class="alert alert-danger text-center mx-4 w-50 ">
                            {{ session('danger') }}
                        </div>
                    </div>
                @endif
                <form action="{{route('subject-topic.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-6">
                            <div class="form-group mb-3">
                                <div class="card custom-card shadow-sm">

                                    <div class="card-body ">
                                        Topic Image ( 1080px X 1080px )
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
                        </div> --}}
                        <div class="col-6">
                            <div class=" -group mb-3">
                                <label class="form-label">Select Subject </label>
                                <select id="select2Basic" class="select2 form-select form-select-lg"
                                    data-allow-clear="true" name="subject_id" required>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}"
                                            {{ old('subject_id') == $subject->subject_id ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                                <div class=" -group mb-3">
                                    <label class="form-label">Enter  Topic </label>
                                    <input type="text" class="form-control" name="subject_topic_name" value="{{ old('subject_topic_name') }}"
                                        placeholder="Enter  Topic Name" required>
                                    @error('subject_topic_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                        

                                </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Upload Topic PDF</label>
                                <input type="file" name="subject_topic_pdf" class="form-control" accept="application/pdf" required>
                                @error('subject_topic_pdf')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="subject_topic_status" required>
                                <option value="1" {{ old('subject_topic_status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('subject_topic_status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                            {{-- <div class="form-group mb-3">
                                <label class="form-label">Paid / Free</label>
                                <select class="form-control" name="paid" required>
                                    <option value="1">Free</option>
                                    <option value="2">Paid</option>
                                </select>
                            </div> --}}
                        </div>

                    </div>



                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info"> X Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2"> <i class="fa fa-save me-2"></i> Save
                            This Topic</button>
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
