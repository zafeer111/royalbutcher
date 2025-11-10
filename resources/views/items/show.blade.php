@extends('layouts.vertical', ['title' => 'Item Details'])

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Item Management</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">View Details</li>
            </ol>
        </div>
    </div>

    <!-- Item Details -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-semibold">Item: {{ $item->name }}</h5>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">
                        <i data-feather="edit-2" class="me-1" style="width: 16px;"></i>
                        Edit Item
                    </a>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <!-- Image Column -->
                        <div class="col-md-4 text-center">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light rounded" style="height: 300px; width: 100%;">
                                    <i data-feather="box" style="width: 100px; height: 100px;" class="text-muted"></i>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Details Column -->
                        <div class="col-md-8">
                            <h3 class="fw-bold">{{ $item->name }}</h3>
                            
                            <p class="text-muted fs-15">
                                {{ $item->description ?? 'No description available.' }}
                            </p>
                            
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Base Price</h6>
                                        <h4 class="fw-normal">Rs. {{ number_format($item->base_price, 2) }}</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Discount</h6>
                                        <h4 class="fw-normal">{{ $item->discount_percent }}%</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Final (Discounted) Price</h6>
                                <h3 class="fw-bold text-success">Rs. {{ number_format($item->discounted_price, 2) }}</h3>
                            </div>

                            <hr>

                             <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Category</h6>
                                        <span class="badge bg-primary-subtle text-primary fs-14">{{ $item->category->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Status</h6>
                                        @if ($item->status)
                                            <span class="badge bg-success-subtle text-success fs-14">Active</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger fs-14">Inactive</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Customization Options -->
                            @if (!empty($item->customization_options))
                                <hr>
                                <h5 class="fw-semibold">Customization Options</h5>
                                <ul class="list-group list-group-flush">
                                    @foreach($item->customization_options as $option)
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            {{ $option['name'] ?? 'N/A' }}
                                            @if(isset($option['price']) && $option['price'] > 0)
                                                <span class="text-muted">+ Rs. {{ number_format($option['price'], 2) }}</span>
                                            @else
                                                <span class="text-muted">(Included)</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
    {{-- Koi specific script zaroori nahi hai show page ke liye --}}
@endsection