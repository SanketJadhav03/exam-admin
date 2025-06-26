@extends('layouts.admin.master')
@section('title', 'Create Chapter')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Chapter</h2>

    <form action="{{ route('chapters.store') }}" method="POST">
        @csrf

        {{-- Hidden Subject ID --}}
        <input type="hidden" name="subject_id" value="{{ $subject_id }}">

        {{-- Chapter Name --}}
        <div class="mb-3">
            <label for="chapter_name" class="form-label">Chapter Name</label>
            <input type="text" name="chapter_name" id="chapter_name" class="form-control" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-success">Create Chapter</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
