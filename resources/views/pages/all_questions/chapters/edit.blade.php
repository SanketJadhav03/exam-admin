@extends('layouts.admin.master')
@section('title', 'Edit Chapter')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Edit Chapter</h3>
                        <a href="{{ route('chapters.index', $chapter->subject_id) }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to Chapters
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('chapters.update', $chapter->chapter_id) }}" method="POST">
                        @csrf

                        <!-- Chapter Name Field -->
                        <div class="mb-4">
                            <label for="chapter_name" class="form-label text-sm font-weight-bold">Chapter Name</label>
                            <div class="input-group input-group-outline">
                                <input type="text" 
                                       name="chapter_name" 
                                       id="chapter_name" 
                                       class="form-control" 
                                       value="{{ $chapter->chapter_name }}"
                                       placeholder="Enter chapter name"
                                       required>
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="form-label text-sm font-weight-bold">Status</label>
                            <div class="input-group input-group-outline">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" {{ $chapter->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $chapter->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('chapters.index', $chapter->subject_id) }}" class="btn btn-outline-secondary me-3">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn bg-gradient-primary">
                                <i class="fas fa-save me-1"></i> Update Chapter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection