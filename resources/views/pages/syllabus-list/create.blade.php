@extends('layouts.admin.master')
@section('title', 'Category Create')
@section('content')
    <div class="container-fluid ">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Create Syllabus Topic</h3>
                <div>
                    <a href="/admin/category_post" class="btn btn-primary">Back to Topic List</a>
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
                <form action="{{route('syllabus-list.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class=" -group mb-3">
                                <label class="form-label">Select Syllabus </label>
                                <select id="select2Basic" class="select2 form-select form-select-lg"
                                    data-allow-clear="true" name="syallabus_id">
                                    <option value="">Select Syllabus</option>
                                    @foreach ($syllabuses as $syllabus)
                                        <option value="{{ $syllabus->syallabus_id }}">{{ $syllabus->syllabus_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class=" -group mb-3">
                                    <label class="form-label">Enter  Topic </label>
                                    <input type="text" class="form-control" name="syllabusTopic_name" value="{{ old('syllabusTopic_name') }}"
                                        placeholder="Enter  Topic Name" required>
                                    @error('syllabusTopic_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                        

                                </div>
                                <div class="form-group mb-3">
                                <label class="form-label">Upload Topic PDF</label>
                                <input type="file" name="syllabusTopic_pdf" class="form-control" accept="application/pdf" required>
                                @error('syllabusTopic_pdf')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                           <div class="form-group mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="syllabusTopic_status" required>
                                <option value="1" {{ old('syllabusTopic_status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('syllabusTopic_status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                          
                        </div>

                    </div>



                    <div class="modal-footer">
                        <button type="reset" class="btn btn-info"> X Reset Form</button>
                        <button type="submit" class="btn btn-primary ms-2"> <i class="fa fa-save me-2"></i> Save
                            Syllabus Topic</button>
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
