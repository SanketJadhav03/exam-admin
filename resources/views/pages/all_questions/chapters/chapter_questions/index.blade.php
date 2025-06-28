@extends('layouts.admin.master')
@section('title', 'Chapter Questions')
@section('content')

<a href="{{ route('chapters_questions.create', $chapter_id) }}" class="btn btn-success mb-3">
    Add Question
</a>
    <a href="{{route('chapters.index',$subject_id)}}" class="btn btn-black mb-3">Back To Chapters</a> 


<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Option A</th>
                <th>Option B</th>
                <th>Option C</th>
                <th>Option D</th>
                <th>Correct Answer</th>
                <th>Explanation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($questions as $question)
                <tr>
                    <td>{{ $question->chapter_question_id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->option_a }}</td>
                    <td>{{ $question->option_b }}</td>
                    <td>{{ $question->option_c }}</td>
                    <td>{{ $question->option_d }}</td>
                    <td>{{ $question->correct_answer }}</td>
                    <td>{{ $question->explanation ?? '—' }}</td>
                    <td>
                        <a href="{{ route('chapters_questions.edit', $question->chapter_question_id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('chapters_questions.destroy', $question->chapter_question_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No questions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
