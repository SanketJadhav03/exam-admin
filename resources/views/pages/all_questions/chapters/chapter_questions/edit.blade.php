@extends('layouts.admin.master')
@section('title', 'Edit Chapter Question')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Chapter Question</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('chapters_questions.update', $question->chapter_question_id) }}" method="POST">
                @csrf

                <input type="hidden" name="chapter_id" value="{{ $question->chapter_id }}">
                <input type="hidden" name="subject_id" value="{{ $question->subject_id }}">

                <div class="mb-3">
                    <label class="form-label">Question</label>
                    <textarea name="question" class="form-control" rows="4" required>{{ $question->question }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Option A</label>
                    <input type="text" name="option_a" class="form-control" value="{{ $question->option_a }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Option B</label>
                    <input type="text" name="option_b" class="form-control" value="{{ $question->option_b }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Option C</label>
                    <input type="text" name="option_c" class="form-control" value="{{ $question->option_c }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Option D</label>
                    <input type="text" name="option_d" class="form-control" value="{{ $question->option_d }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correct Answer</label>
                    <select name="correct_answer" class="form-select" required>
                        <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Explanation (Optional)</label>
                    <textarea name="explanation" class="form-control" rows="3">{{ $question->explanation }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Question</button>
            </form>
            <a href="{{ route('chapters_questions.index', ['chapter_id' => $question->chapter_id, 'subject_id' => $question->subject_id]) }}" class="btn btn-secondary mt-3">
            <button>Cancel</button>
            </a>
        </div>
    </div>
</div>

@endsection
