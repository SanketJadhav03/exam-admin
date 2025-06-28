@extends('layouts.admin.master')
@section('title', 'Create Chapter')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Add New Chapter</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('chapters.store') }}" method="POST">
                        @csrf
                        
                        <!-- Hidden Subject ID -->
                        <input type="hidden" name="subject_id" value="{{ $subject_id }}">

                        <!-- Chapter Name Field -->
                        <div class="mb-4">
                            <label for="chapter_name" class="form-label text-sm font-weight-bold">Chapter Name</label>
                            <div class="input-group input-group-outline">
                                <input type="text" 
                                       name="chapter_name" 
                                       id="chapter_name" 
                                       class="form-control" 
                                       placeholder="Enter chapter name"
                                       required>
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="form-label text-sm font-weight-bold">Status</label>
                            <div class="input-group input-group-outline">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="reset" class="btn btn-outline-secondary me-3">
                                <i class="fas fa-redo me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn bg-gradient-success">
                                <i class="fas fa-save me-1"></i> Create Chapter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection