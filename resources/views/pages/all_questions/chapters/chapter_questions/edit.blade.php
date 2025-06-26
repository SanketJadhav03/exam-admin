@extends('layouts.admin.master')
@section('title', 'Edit Chapter Question')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Chapter Question</h4>
                        <a href="{{ route('chapters_questions.index', ['chapter_id' => $question->chapter_id, 'subject_id' => $question->subject_id]) }}" 
                           class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to Questions
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('chapters_questions.update', $question->chapter_question_id) }}" method="POST">
                        @csrf
                        

                        <input type="hidden" name="chapter_id" value="{{ $question->chapter_id }}">
                        <input type="hidden" name="subject_id" value="{{ $question->subject_id }}">

                        <!-- Question Field -->
                        <div class="mb-4">
                            <label class="form-label text-sm font-weight-bold">Question</label>
                            <div class="input-group input-group-outline">
                                <textarea name="question" class="form-control" rows="4" required
                                          placeholder="Enter the question text">{{ $question->question }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Options -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label text-sm font-weight-bold">Option A</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="option_a" class="form-control" 
                                               value="{{ $question->option_a }}" required
                                               placeholder="Enter option A">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-sm font-weight-bold">Option B</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="option_b" class="form-control" 
                                               value="{{ $question->option_b }}" required
                                               placeholder="Enter option B">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label text-sm font-weight-bold">Option C</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="option_c" class="form-control" 
                                               value="{{ $question->option_c }}" required
                                               placeholder="Enter option C">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-sm font-weight-bold">Option D</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="option_d" class="form-control" 
                                               value="{{ $question->option_d }}" required
                                               placeholder="Enter option D">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-4">
                            <label class="form-label text-sm font-weight-bold">Correct Answer</label>
                            <div class="input-group input-group-outline">
                                <select name="correct_answer" class="form-control" required>
                                    <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>Option A</option>
                                    <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>Option B</option>
                                    <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>Option C</option>
                                    <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>Option D</option>
                                </select>
                            </div>
                        </div>

                        <!-- Explanation -->
                        <div class="mb-4">
                            <label class="form-label text-sm font-weight-bold">Explanation (Optional)</label>
                            <div class="input-group input-group-outline">
                                <textarea name="explanation" class="form-control" rows="3"
                                          placeholder="Add explanation for the correct answer">{{ $question->explanation }}</textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('chapters_questions.index', ['chapter_id' => $question->chapter_id, 'subject_id' => $question->subject_id]) }}" 
                               class="btn btn-outline-secondary me-3">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn bg-gradient-primary">
                                <i class="fas fa-save me-1"></i> Update Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .input-group.input-group-outline {
        border-radius: 8px;
        transition: all 0.3s;
    }
    .input-group.input-group-outline:focus-within {
        box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
    }
    textarea.form-control {
        min-height: 120px;
    }
</style>

@endsection