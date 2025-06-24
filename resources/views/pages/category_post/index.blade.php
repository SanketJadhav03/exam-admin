@extends('layouts.admin.master')
@section('title', 'Category Post')
@section('content')
    <div class="container-fluid">
        <div class="card mt-2">
            <div class=" card-header d-flex justify-content-between align-items-center">
                <h4>Category Post</h4>
                {{-- Filter by festival  --}}
                <div class="d-flex align-items-center">
                    <select id="select2Basic" class="select2 form-select form-select-lg me-2" data-allow-clear="true"
                        name="festival_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $festival)
                            <option value="{{ $festival->id }}">{{ $festival->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="/admin/category_post/create" class="btn btn-primary">Create Category Post</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="justify-content-center d-flex  ">
                        <div class="alert alert-success text-center mx-4 w-50 ">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="justify-content-center d-flex  ">
                        <div class="alert alert-warning text-center mx-4 w-50 ">
                            {{ session('warning') }}
                        </div>
                    </div>
                @endif
                @if (session('danger'))
                    <div class="justify-content-center d-flex  ">
                        <div class="alert alert-danger text-center mx-4 w-50 ">
                            {{ session('danger') }}
                        </div>
                    </div>
                @endif
                <div class="row gy-4 mb-4">
                    @forelse ($categoryPosts as $categoryPost)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                <!-- Card with background image -->
                                <div class="card-body text-center p-0 position-relative"
                                    style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0,0,0,0.3)), 
                                        url('{{ $categoryPost->post_image ? asset('uploads/category_post/' . $categoryPost->post_image) : asset('path/to/default-image.jpg') }}');
                                        background-size: cover;
                                        background-position: center;
                                        height: 300px;">

                                    <!-- Content overlay with semi-transparent background -->
                                    <div class="position-absolute bottom-0 start-0 end-0 p-1"
                                        style="background: rgba(0, 0, 0, 0.1);">



                                        <!-- Status Toggle -->
                                   
                                        <div class="d-flex justify-content-between mb-2">

                                            <div class="btn btn-sm btn-info me-2 rounded" data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                data-image="{{ asset('uploads/category_post/' . $categoryPost->post_image) }}">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <a href="/category_post/edit/{{ $categoryPost->id }}"
                                                class="btn btn-sm btn-primary me-2 rounded" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/admin/category_post/{{ $categoryPost->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this festival?')"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="me-4">
                                                <label class="switch switch-success">
                                                    <input type="checkbox" data-id="{{ $categoryPost->id }}"
                                                        class="switch-input status-toggle"
                                                        {{ $categoryPost->status ? 'checked' : '' }}>
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

                                    <!-- Featured badge (top right) -->

                                    <span
                                        class="position-absolute top-0 start-0 end-0 d-flex justify-content-between align-items-center"
                                        style="background: rgba(0,0,0,0.1);">
                                        <h5 class=" ps-2 pt-1 card-title text-white mb-2">{{ $festival->name }}</h5>
                                        <div>
                                            <input type="checkbox" class="form-check-input me-2 " id="flexCheckDefault"
                                                {{ $categoryPost->paid == 1 ? 'checked' : '' }}>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if ($loop->iteration % 4 == 0)
                </div>
                <div class="row">
                    @endif
                @empty
                    <div colspan="5" class="text-center">No Post found</div>
                    @endforelse
                </div>
                <div class="row mx-2 mt-3">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info">
                            Showing {{ $categoryPosts->firstItem() }} to {{ $categoryPosts->lastItem() }} of
                            {{ $categoryPosts->total() }} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                                {{ $categoryPosts->onEachSide(1)->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Image View Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Category Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="" class="img-fluid" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageModal = document.getElementById('imageModal');
            var modalImage = document.getElementById('modalImage');

            imageModal.addEventListener('show.bs.modal', function(event) {
                var triggerImage = event.relatedTarget;
                var imageUrl = triggerImage.getAttribute('data-image');
                modalImage.src = imageUrl;
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.status-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const festivalId = this.dataset.id;
                    const isChecked = this.checked;

                    axios.post('/admin/category_post/status', {
                            id: festivalId,
                            status: isChecked ? 1 : 0
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.data.status == 1) {
                                toastr.success(response.data.message);
                            } else {
                                toastr.warning(response.data.message);
                            }
                        })
                        .catch(error => {
                            toastr.error('Failed to update status.');
                            this.checked = !isChecked; // rollback toggle
                        });
                });
            });
        });
    </script>
@endsection
