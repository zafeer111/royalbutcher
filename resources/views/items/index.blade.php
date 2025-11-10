@extends('layouts.vertical', ['title' => 'Item Management'])

@section('css')
    @vite(['node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css', 'node_modules/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css', 'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Item Management</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Items</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </div>
    </div>

    <!-- Datatables -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">

                <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                    <h5 class="card-title mb-0 fw-semibold">Item List</h5>
                    <a href="{{ route('items.create') }}" class="btn btn-primary" id="createButton">
                        <i data-feather="plus" class="me-1" style="width: 16px;"></i>
                        Create Item
                    </a>
                </div><!-- end card header -->

                <div class="card-body">
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive table-hover table-responsive nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Base Price</th>
                                <th>Discounted Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="rounded-circle" height="40" width="40" style="object-fit: cover;">
                                        @else
                                            <span class="badge bg-light text-dark rounded-circle p-2">
                                                <i data-feather="box" style="width: 20px; height: 20px;"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.show', $item->id) }}" class="fw-semibold text-dark">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary">{{ $item->category->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>Rs. {{ number_format($item->base_price, 2) }}</td>
                                    <td class="fw-semibold">
                                        Rs. {{ number_format($item->discounted_price, 2) }}
                                        @if($item->discount_percent > 0)
                                            <small class="text-danger d-block">({{ $item->discount_percent }}% off)</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status)
                                            <span class="badge bg-success-subtle text-success">Active</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            
                                            <!-- 
                                              FIX: Delete Form/Button ko Modal se trigger karengay
                                              1. 'delete-item-form' aur 'delete-item-btn' classes remove kar di.
                                              2. 'data-bs-toggle' aur 'data-bs-target' add kiya.
                                              3. 'data-delete-url' add kiya taake JS ko URL mil sakay.
                                              4. TYPO: type-="button" ko type="button" kar diya.
                                            -->
                                            <button type="button" class="btn btn-sm btn-danger delete-item-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteItemModal"
                                                    data-delete-url="{{ route('items.destroy', $item->id) }}">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- NEW: Delete Confirmation Modal -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteItemModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteModalForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

@section('script')
    @vite(['resources/js/pages/datatable.init.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteItemModal');
            var deleteModalForm = document.getElementById('deleteModalForm');

            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var deleteUrl = button.getAttribute('data-delete-url');
                
                deleteModalForm.setAttribute('action', deleteUrl);
            });
        });
    </script>
@endsection