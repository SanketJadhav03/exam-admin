@extends('layouts.admin.master')
@section('title', 'Festival')

@section('content')
    <div class="container-fluid">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Festivals</h3>
                <div>
                    <a href="/admin/festival/create" class="btn btn-primary">Create Festival</a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
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
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header d-flex border-top rounded-0 flex-wrap py-2">
                        <div class="me-5 ms-n2 pe-5">

                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                                        class="form-control" placeholder="Search Product"
                                        aria-controls="DataTables_Table_0"></label></div>
                        </div>

                        <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                            <div
                                class="dt-action-buttons d-flex flex-column align-items-start align-items-md-center justify-content-sm-center mb-3 mb-md-0 pt-0 gap-4 gap-sm-0 flex-sm-row">
                                <div class="dataTables_length mt-2 mt-sm-0 mt-md-3 me-2" id="DataTables_Table_0_length">
                                    <label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="form-select">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                        </select></label>
                                </div>
                                <div class="dt-buttons btn-group flex-wrap d-flex">
                                    <div class="btn-group"><button
                                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-secondary me-3"
                                            tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                            aria-haspopup="dialog" aria-expanded="false"><span><i
                                                    class="ti ti-download me-1 ti-xs"></i>Export</span><span
                                                class="dt-down-arrow"></span></button></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($festivals as $festival)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                    <!-- Card with background image -->
                                    <div class="card-body text-center p-0 position-relative"
                                        style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0,0,0,0.3)), 
                                                url('{{ $festival->image ? asset('uploads/festivals/' . $festival->image) : asset('path/to/default-image.jpg') }}');
                                                background-size: cover;
                                                background-position: center;
                                                height: 300px;">

                                        <!-- Content overlay with semi-transparent background -->
                                        <div class="position-absolute bottom-0 start-0 end-0 p-1"
                                            style="background: rgba(0, 0, 0, 0.1);">



                                            <!-- Status Toggle -->
                                            <div class="d-flex    text-white">


                                                <span class="">
                                                    <h5 class="text-white">
                                                        <i
                                                            class="fa fa-calendar fs-25 text-danger align-items-center ps-3 pe-1"></i>
                                                        {{ \Carbon\Carbon::parse($festival->festival_date)->format('d M Y') }}
                                                    </h5>
                                                </span>
                                            </div>
                                            <div class="d-flex  justify-content-evenly   mb-2">

                                                <div class="btn btn-sm btn-info me-2 rounded" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-image="{{ asset('uploads/festivals/' . $festival->image) }}">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <a href="/festival/edit/{{ $festival->id }}"
                                                    class="btn btn-sm btn-primary me-2 rounded" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="/admin/festival/{{ $festival->id }}" method="POST"
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
                                                        <input type="checkbox" data-id="{{ $festival->id }}"
                                                            class="switch-input status-toggle"
                                                            {{ $festival->status == 1 ? 'checked' : '' }}>
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
                                            <h5 class=" ps-2 pt-1 card-title text-white mb-2">{{ $festival->title }}</h5>
                                            <div>
                                                <input type="checkbox" class="form-check-input me-2 " id="flexCheckDefault"
                                                    {{ $festival->feature == 1 ? 'checked' : '' }}>
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
                        <div class="col-12">
                            <div class="alert alert-info text-center">No festivals found</div>
                        </div>
                        @endforelse
                    </div>


                    <div class="row mx-2 mt-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info">
                                Showing {{ $festivals->firstItem() }} to {{ $festivals->lastItem() }} of
                                {{ $festivals->total() }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {{ $festivals->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
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
                    <h5 class="modal-title" id="imageModalLabel">Festival Image</h5>
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

                    axios.post('/admin/festival/status', {
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
