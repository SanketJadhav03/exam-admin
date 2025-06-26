@extends('layouts.admin.master')
@section('title', 'Edit Chapter')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Chapter</h2>

    <form action="{{ route('chapters.update', $chapter->chapter_id) }}" method="POST">
        @csrf

        {{-- Chapter Name --}}
        <div class="mb-3">
            <label for="chapter_name" class="form-label">Chapter Name</label>
            <input type="text" name="chapter_name" id="chapter_name" class="form-control" value="{{ $chapter->chapter_name }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" {{ $chapter->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $chapter->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update Chapter</button>
        <a href="{{ route('chapters.index', $chapter->subject_id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
