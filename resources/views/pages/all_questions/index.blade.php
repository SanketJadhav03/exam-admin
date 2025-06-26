@extends('layouts.admin.master')
@section('title', 'All Questions Index')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-primary text-white">
            <h3 class="mb-0">Subjects</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td class="ps-4">
                                <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $subject['subject_name'] }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($subject['subject_image'])
                                    <img src="{{ asset('path/to/subject_images/' . $subject['subject_image']) }}" 
                                         class="avatar avatar-sm me-3" 
                                         alt="Subject Image">
                                @else
                                    <span class="badge badge-sm bg-gradient-secondary">No Image</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('chapters.index', ['subject_id' => $subject['subject_id']]) }}" 
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="fas fa-book-open me-1"></i> Chapters
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection