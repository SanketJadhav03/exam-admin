@extends('layouts.admin.master')
@section('title', 'Chapter Questions')
@section('content')

<div class="container-fluid py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Chapter Questions</h3>
        <div>
            <a href="{{ route('chapters_questions.create', $chapter_id) }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus-circle me-1"></i> Add Question
            </a>
            <a href="{{ route('chapters.index', $subject_id) }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Back To Chapters
            </a>
        </div>
    </div>

    @if($questions->isEmpty())
    <div class="card shadow-sm">
        <div class="card-body text-center py-5">
            <i class="fas fa-question-circle text-secondary mb-3" style="font-size: 3rem;"></i>
            <h5 class="text-muted">No questions found</h5>
            <a href="{{ route('chapters_questions.create', $chapter_id) }}" class="btn btn-success btn-sm mt-3">
                <i class="fas fa-plus me-1"></i> Add First Question
            </a>
        </div>
    </div>
    @else
    <div class="row">
        @foreach($questions as $question)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-gradient-primary text-white py-2">
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Question #{{ $question->chapter_question_id }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-title mb-3" style="padding-top:5px ">{{ $question->question }}</h6>
                    
                    <div class="options-container mb-3">
                        <div class="option-item {{ $question->correct_answer === 'A' ? 'correct-answer' : '' }}">
                            <strong>A:</strong> {{ $question->option_a }}
                        </div>
                        <div class="option-item {{ $question->correct_answer === 'B' ? 'correct-answer' : '' }}">
                            <strong>B:</strong> {{ $question->option_b }}
                        </div>
                        <div class="option-item {{ $question->correct_answer === 'C' ? 'correct-answer' : '' }}">
                            <strong>C:</strong> {{ $question->option_c }}
                        </div>
                        <div class="option-item {{ $question->correct_answer === 'D' ? 'correct-answer' : '' }}">
                            <strong>D:</strong> {{ $question->option_d }}
                        </div>
                    </div>
                    
                    @if($question->explanation)
                    <div class="explanation mt-3 p-2 bg-light rounded">
                        <strong>Explanation:</strong>
                        <p class="mb-0">{{ $question->explanation }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-footer bg-transparent py-2 d-flex justify-content-between align-items-center">
                    <span class="badge bg-success">
                        Correct: {{ $question->correct_answer }}
                    </span>
                    <div class="d-flex">
                        <a href="{{ route('chapters_questions.edit', $question->chapter_question_id) }}" 
                           class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('chapters_questions.destroy', $question->chapter_question_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    .option-item {
        padding: 5px;
        margin-bottom: 5px;
        border-radius: 4px;
        background-color: #f8f9fa;
    }
    .correct-answer {
        background-color: #d1fae5;
        border-left: 3px solid #10b981;
    }
    .card {
        transition: transform 0.2s;
        border-radius: 8px;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-footer {
        border-top: 1px solid rgba(0,0,0,.125);
    }
    .explanation {
        font-size: 0.875rem;
    }
</style>

@endsection