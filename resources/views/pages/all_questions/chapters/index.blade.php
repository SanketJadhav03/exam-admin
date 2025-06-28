@extends('layouts.admin.master')
@section('title', 'Chapters Index')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Chapters List</h3>
                <div>
                    <a href="{{route('chapter.create',$subject_id)}}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus-circle me-1"></i> Add Chapter
                    </a> 
                    <a href="{{route('all_questions.index')}}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back To Subjects
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Chapter Name</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chapters as $chapter)
                        <tr>
                            <td class="ps-4">
                                <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $chapter->chapter_name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($chapter->status === 'active')
                                    <span class="badge bg-gradient-success">Active</span>
                                @else
                                    <span class="badge bg-gradient-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('chapters.edit', $chapter->chapter_id) }}" 
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2"
                                       data-bs-toggle="tooltip" 
                                       title="Edit Chapter">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('chapters.destroy',$chapter->chapter_id)}}" 
                                       class="btn btn-sm btn-outline-danger rounded-pill px-3 me-2"
                                       data-bs-toggle="tooltip" 
                                       title="Delete Chapter">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="{{ route('chapters_questions.index', $chapter->chapter_id) }}" 
                                       class="btn btn-sm btn-outline-info rounded-pill px-3"
                                       data-bs-toggle="tooltip" 
                                       title="View Questions">
                                        <i class="fas fa-question-circle"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fas fa-folder-open text-secondary mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="text-muted">No chapters found for this subject</h6>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize tooltips
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
@endsection