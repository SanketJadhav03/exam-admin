@extends('layouts.admin.master')
@section('title', 'Edit Chapter Question')
@section('content')

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient-primary text-white py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Question</h5>
                        <a href="{{ route('chapters_questions.index', ['chapter_id' => $question->chapter_id, 'subject_id' => $question->subject_id]) }}" 
                           class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('chapters_questions.update', $question->chapter_question_id) }}" method="POST">
                        @csrf

                        <input type="hidden" name="chapter_id" value="{{ $question->chapter_id }}">
                        <input type="hidden" name="subject_id" value="{{ $question->subject_id }}">

                        <!-- Question Field -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Question</label>
                            <input type="text" name="question" class="form-control form-control-sm" 
                                   value="{{ $question->question }}" required
                                   placeholder="Enter question">
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option A</label>
                                    <input type="text" name="option_a" class="form-control form-control-sm" 
                                           value="{{ $question->option_a }}" required
                                           placeholder="Option A">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option B</label>
                                    <input type="text" name="option_b" class="form-control form-control-sm" 
                                           value="{{ $question->option_b }}" required
                                           placeholder="Option B">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option C</label>
                                    <input type="text" name="option_c" class="form-control form-control-sm" 
                                           value="{{ $question->option_c }}" required
                                           placeholder="Option C">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small font-weight-bold">Option D</label>
                                    <input type="text" name="option_d" class="form-control form-control-sm" 
                                           value="{{ $question->option_d }}" required
                                           placeholder="Option D">
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Correct Answer</label>
                            <select name="correct_answer" class="form-select form-select-sm" required>
                                <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                        </div>

                        <!-- Explanation -->
                        <div class="mb-3">
                            <label class="form-label small font-weight-bold">Explanation (Optional)</label>
                            <input type="text" name="explanation" class="form-control form-control-sm"
                                   value="{{ $question->explanation }}"
                                   placeholder="Brief explanation">
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('chapters_questions.index', ['chapter_id' => $question->chapter_id, 'subject_id' => $question->subject_id]) }}" 
                               class="btn btn-outline-secondary btn-sm me-2">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save me-1"></i> Save Changes
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