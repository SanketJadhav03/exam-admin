@extends('layouts.admin.master') 
@section('title', 'All Questions Index')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Subjects</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject['subject_name'] }}</td>
                    <td>
                        @if($subject['subject_image'])
                            <img src="{{ asset('path/to/subject_images/' . $subject['subject_image']) }}" alt="Subject Image" width="50">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('chapters.index', ['subject_id' => $subject['subject_id']]) }}" class="btn btn-primary btn-sm">
                            Chapters
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
