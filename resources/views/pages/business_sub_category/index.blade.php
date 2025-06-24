@extends('layouts.admin.master')
@section('title', 'Business Category')

@section('content')
    <div class="container-fluid">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Business Sub Category</h3>
                <div>
                    <a href="/admin/business_sub_category/create" class="btn btn-primary">Create Business Sub Category</a>
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
                    <table class="datatables-products table dataTable no-footer dtr-column" id="DataTables_Table_0"
                        aria-describedby="DataTables_Table_0_info">
                        <thead class="border-top">
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                    style="width: 20.8125px; display: none;" aria-label=""></th>
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                    colspan="1" style="width: 17.35px;" data-col="1" aria-label="">
                                #
                                </th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 118.325px;"
                                    aria-label="product: activate to sort column ascending" aria-sort="descending">Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 130.188px;"
                                    aria-label="category: activate to sort column ascending">Title</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 62.5125px;"
                                    aria-label="sku: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 81.8px;"
                                    aria-label="price: activate to sort column ascending">
                                    Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($business_sub_categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        @if ($category->icon)
                                            <img src="{{ asset('uploads/business_sub_category/' . $category->icon) }}"
                                                alt="{{ $category->name }}" class="img-thumbnail"
                                                style="width: 60px; height: 60px; object-fit: cover;" data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                data-image="{{ asset('uploads/business_sub_category/' . $category->icon) }}"
                                                title="Click to view more">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>

                                    <td>{{ $category->name }}</td>
                                    <td class="text- ">
                                        <label class="switch switch-success">
                                            <input type="checkbox" data-id="{{ $category->id }}" class="switch-input  status-toggle" {{ $category->status ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="ti ti-check"></i> 
                                                </span>
                                                <span class="switch-off">
                                                    <i class="ti ti-x"></i>
                                                </span>
                                            </span>
                                            <span class="switch-label">
                                                {{ $category->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </label>
                                        
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/business_sub_category/edit/{{ $category->id }}"
                                                class="btn btn-sm btn-primary me-1 rounded" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/admin/business_sub_category/{{ $category->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No categories found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row mx-2 mt-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info">
                                Showing {{ $business_sub_categories->firstItem() }} to {{ $business_sub_categories->lastItem() }} of {{ $business_sub_categories->total() }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {{ $business_sub_categories->onEachSide(1)->links('pagination::bootstrap-4') }}
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
                    <h5 class="modal-title" id="imageModalLabel">Business Category Image</h5>
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
         document.addEventListener('DOMContentLoaded', function () {
        var imageModal = document.getElementById('imageModal');
        var modalImage = document.getElementById('modalImage');

        imageModal.addEventListener('show.bs.modal', function (event) {
            var triggerImage = event.relatedTarget;
            var imageUrl = triggerImage.getAttribute('data-image');
            modalImage.src = imageUrl;
        });
    });
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.status-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const categoryId = this.dataset.id;
                    const isChecked = this.checked;

                    axios.post('/admin/business_sub_category/status', {
                            id: categoryId,
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
