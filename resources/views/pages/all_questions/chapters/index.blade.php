@extends('layouts.admin.master')
@section('title', 'Chapters Index')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Chapters List</h2>
    
    <a href="{{route('chapter.create',$subject_id)}}" class="btn btn-success mb-3">+ Add Chapter</a> 
    <a href="{{route('all_questions.index')}}" class="btn btn-black mb-3">Back To Subjects</a> 
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Chapter Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chapters as $chapter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $chapter->chapter_name }}</td>
                    <td>
                        @if ($chapter->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        {{-- Add appropriate routes later --}}
                        <a href="{{ route('chapters.edit', $chapter->chapter_id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('chapters.destroy',$chapter->chapter_id)}}" class="btn btn-sm btn-danger">Delete</a>
                        <a href="{{ route('chapters_questions.index', $chapter->chapter_id) }}" class="btn btn-sm btn-primary">Questions</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No chapters found for this subject.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
