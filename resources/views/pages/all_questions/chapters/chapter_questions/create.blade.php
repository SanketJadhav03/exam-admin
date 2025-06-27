@extends('layouts.admin.master')
@section('title', 'Add Chapter Question')
@section('content')

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient-primary text-white py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Question</h5>
                        <a href="{{ route('chapters_questions.index', ['chapter_id' => $chapterId, 'subject_id' => $subjectId]) }}" 
                           class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('chapter_question.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="chapter_id" value="{{ $chapterId }}">
                        <input type="hidden" name="subject_id" value="{{ $subjectId }}">

                        <!-- Question Field -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Question</label>
                            <input type="text" name="question" class="form-control form-control-sm" 
                                   required placeholder="Enter question">
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option A</label>
                                    <input type="text" name="option_a" class="form-control form-control-sm" 
                                           required placeholder="Option A">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option B</label>
                                    <input type="text" name="option_b" class="form-control form-control-sm" 
                                           required placeholder="Option B">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option C</label>
                                    <input type="text" name="option_c" class="form-control form-control-sm" 
                                           required placeholder="Option C">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option D</label>
                                    <input type="text" name="option_d" class="form-control form-control-sm" 
                                           required placeholder="Option D">
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Correct Answer</label>
                            <select name="correct_answer" class="form-select form-select-sm" required>
                                <option value="">-- Select Correct Option --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>

                        <!-- Explanation -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Explanation (Optional)</label>
                            <input type="text" name="explanation" class="form-control form-control-sm"
                                   placeholder="Brief explanation">
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('chapters_questions.index', ['chapter_id' => $chapterId, 'subject_id' => $subjectId]) }}" 
                               class="btn btn-outline-secondary btn-sm me-2">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-circle me-1"></i> Add Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 8px;
    }
    .form-control, .form-select {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
    }
    .form-label {
        margin-bottom: 0.25rem;
    }
    .card-header {
        padding: 0.75rem 1rem;
    }
    .card-body {
        padding: 1rem;
    }
</style>

@endsection