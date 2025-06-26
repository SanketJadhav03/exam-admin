@extends('layouts.admin.master')
@section('title', 'Edit Festival Post')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Subject Topic</h3>
                <div>
                    <a href="/admin/festival_post" class="btn btn-primary">Back to Topics</a>
                </div>
            </div>
            <div class="card-body ">
               <form action="{{ route('subject-topic.update', $subjectTopic->subject_child_id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $subjectTopic->subject_child_id }}">
                       
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
                           
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info">Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="fa fa-save me-2"></i> Update This Topic
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