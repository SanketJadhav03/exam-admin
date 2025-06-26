@extends('layouts.admin.master')
@section('title', 'Chapter Questions')
@section('content')

<a href="{{ route('chapters_questions.create', $chapterId) }}" class="btn btn-success mb-3">
    <button>Add Question</button>
</a>


@endsection