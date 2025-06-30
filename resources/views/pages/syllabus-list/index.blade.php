@extends('layouts.admin.master')
@section('title', 'Syllabus Topics')
@section('content')
    <div class="container-fluid">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Syllabus Topics</h4>

              <div class="d-flex align-items-center">
    <form method="GET" action="{{ route('syllabus-list.filterTopic') }}" class="d-flex align-items-center">
        <select id="syallabus_id" name="syallabus_id" class="form-select form-select-lg me-2">
            <option value="">Select Syllabus</option>
            @foreach ($syllabuses as $title)
                <option value="{{ $title->syallabus_id }}"
                    {{ request('syallabus_id') == $title->syallabus_id ? 'selected' : '' }}>
                    {{ $title->syllabus_name }}
                </option>
            @endforeach
        </select>
    </form>
</div>
               

                <!-- Add New -->
                <div>
                    <a href="{{ route('syllabus-list.create') }}" class="btn btn-primary">Add New Topic</a>
                </div>
            </div>

            <div class="card-body">
                {{-- Flash Messages --}}
                @foreach (['success', 'warning', 'danger'] as $msg)
                    @if (session($msg))
                        <div class="justify-content-center d-flex">
                            <div class="alert alert-{{ $msg }} text-center mx-4 w-50">
                                {{ session($msg) }}
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- Topics Cards -->
                <div class="row gy-4 mb-4">
                    @forelse ($syllabusTopics as $topic)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                <div class="card-body text-center p-0 position-relative"
                                     style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0,0,0,0.3)); 
                                            background-size: cover;
                                            background-position: center;
                                            height: 300px;">
                                            @if($topic->syllabusTopic_pdf)
                                    <a href="{{ asset('storage/' . $topic->syllabusTopic_pdf) }}" target="_blank"
                                    class="position-absolute top-50 start-50 translate-middle text-white"
                                    style="z-index: 10; font-size: 40px; text-shadow: 1px 1px 5px black;">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </a>
                                @endif
                                    
                                    <!-- Content Overlay -->
                                    <div class="position-absolute bottom-0 start-0 end-0 p-1"
                                         style="background: rgba(0, 0, 0, 0.1);">

                                        <div class="d-flex justify-content-between mb-2">
                                            <!-- Edit -->
                                            <a href="{{ route('syllabus-list.edit', $topic->syllabusTopic_id) }}"
                                               class="btn btn-sm btn-primary me-2 rounded" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('syllabus-list.destroy', $topic->syllabusTopic_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this topic?')"
                                                        title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                            <!-- Status -->
                                            <div class="me-4">
                                                <label class="switch switch-success">
                                                    <input type="checkbox" data-id="{{ $topic->syllabusTopic_id }}"
                                                           class="switch-input status-toggle"
                                                           {{ $topic->syllabusTopic_status == 1 ? 'checked' : '' }}>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on">
                                                            <i class="ti ti-check text-white"></i>
                                                        </span>
                                                        <span class="switch-off">
                                                            <i class="ti ti-x text-white"></i>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <span class="position-absolute top-0 start-0 end-0 d-flex justify-content-between align-items-center"
                                          style="background: rgba(0,0,0,0.1);">
                                        <h5 class="ps-2 pt-1 card-title text-white mb-2">{{ $topic->syllabusTopic_name }}</h5>
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if ($loop->iteration % 4 == 0)
                </div><div class="row gy-4 mb-4">
                        @endif
                    @empty
                        <div colspan="5" class="text-center">No Topic found</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filter = document.getElementById('syllabusFilter');
            filter.addEventListener('change', function () {
                this.form.submit();
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.status-toggle').forEach(toggle => {
                toggle.addEventListener('change', function () {
                    const topicId = this.dataset.id;
                    const status = this.checked ? 1 : 0;

                    axios.post('/admin/syllabus-list/status', {
                        id: topicId,
                        status: status
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).then(response => {
                        if (response.data.status) {
                            toastr.success(response.data.message);
                        } else {
                            toastr.warning(response.data.message);
                        }
                    }).catch(error => {
                        toastr.error('Something went wrong!');
                        this.checked = !status; // rollback
                    });
                });
            });
        });
    </script>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const subjectFilter = document.getElementById('syllabuslist');
        subjectFilter.addEventListener('change', function () {
            this.form.submit(); // auto-submit form
        });
    });
</script>
@endsection
