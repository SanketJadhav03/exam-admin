@extends('layouts.admin.master')
@section('title', 'Add Chapter Question')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Add New Question</h4>
                        <a href="javascript:history.back()" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('chapter_question.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="chapter_id" value="{{ $chapterId }}">
                        <input type="hidden" name="subject_id" value="{{ $subjectId }}">

                        <!-- Question Field -->
                        <div class="mb-4">
                            <label for="question" class="form-label text-sm font-weight-bold">Question</label>
                            <div class="input-group input-group-outline mb-3">
                                <textarea name="question" id="question" class="form-control" rows="4" required
                                          placeholder="Enter the question text"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Options Column 1 -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="option_a" class="form-label text-sm font-weight-bold">Option A</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="option_a" id="option_a" class="form-control" required
                                               placeholder="Enter option A text">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="option_b" class="form-label text-sm font-weight-bold">Option B</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="option_b" id="option_b" class="form-control" required
                                               placeholder="Enter option B text">
                                    </div>
                                </div>
                            </div>

                            <!-- Options Column 2 -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="option_c" class="form-label text-sm font-weight-bold">Option C</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="option_c" id="option_c" class="form-control" required
                                               placeholder="Enter option C text">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="option_d" class="form-label text-sm font-weight-bold">Option D</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="option_d" id="option_d" class="form-control" required
                                               placeholder="Enter option D text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-4">
                            <label for="correct_answer" class="form-label text-sm font-weight-bold">Correct Answer</label>
                            <div class="input-group input-group-outline mb-3">
                                <select name="correct_answer" id="correct_answer" class="form-control" required>
                                    <option value="">-- Select Correct Option --</option>
                                    <option value="A">Option A</option>
                                    <option value="B">Option B</option>
                                    <option value="C">Option C</option>
                                    <option value="D">Option D</option>
                                </select>
                            </div>
                        </div>

                        <!-- Explanation -->
                        <div class="mb-4">
                            <label for="explanation" class="form-label text-sm font-weight-bold">Explanation (Optional)</label>
                            <div class="input-group input-group-outline mb-3">
                                <textarea name="explanation" id="explanation" class="form-control" rows="3"
                                          placeholder="Add explanation for the correct answer"></textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" onclick="window.history.back()" class="btn btn-outline-secondary me-3">
                                <i class="fas fa-times me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn bg-gradient-primary">
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
    .form-label {
        margin-bottom: 0.5rem;
        display: block;
    }
</style>

@endsection