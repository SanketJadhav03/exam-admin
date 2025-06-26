@extends('layouts.admin.master')
@section('title', 'Add Chapter Question')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Add Chapter Question</h4>
        </div>
        <h1>{{$subjectId}}</h1>
        <div class="card-body">
            <form action="{{ route('chapter_question.store') }}" method="POST">
                @csrf

                <input type="hidden" name="chapter_id" value="{{ $chapterId }}">
                <input type="hidden" name="subject_id" value="{{ $subjectId }}">

                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <textarea name="question" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="option_a" class="form-label">Option A</label>
                    <input type="text" name="option_a" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="option_b" class="form-label">Option B</label>
                    <input type="text" name="option_b" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="option_c" class="form-label">Option C</label>
                    <input type="text" name="option_c" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="option_d" class="form-label">Option D</label>
                    <input type="text" name="option_d" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="correct_answer" class="form-label">Correct Answer (A/B/C/D)</label>
                    <select name="correct_answer" class="form-select" required>
                        <option value="">-- Select Correct Answer --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="explanation" class="form-label">Explanation (optional)</label>
                    <textarea name="explanation" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Question</button>
            </form>
        </div>
    </div>
</div>

@endsection
