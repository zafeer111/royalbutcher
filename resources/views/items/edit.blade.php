@extends('layouts.vertical', ['title' => 'Edit Item'])

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Item Management</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <!-- Form Validation -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-semibold">Edit Item: {{ $item->name }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <form class="row g-3" action="{{ route('items.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Item Name Field -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{ old('name', $item->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Select -->
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id" required>
                                <option value="" disabled>Select a category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Base Price -->
                        <div class="col-md-4">
                             <label for="base_price" class="form-label">Base Price (Rs.)</label>
                             <input type="number" step="0.01" name="base_price" class="form-control @error('base_price') is-invalid @enderror"
                                id="base_price" value="{{ old('base_price', $item->base_price) }}" required>
                            @error('base_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Discount Percent -->
                        <div class="col-md-4">
                             <label for="discount_percent" class="form-label">Discount (%)</label>
                             <input type="number" step="0.01" name="discount_percent" class="form-control @error('discount_percent') is-invalid @enderror"
                                id="discount_percent" value="{{ old('discount_percent', $item->discount_percent) }}">
                                <small class="form-text text-muted">Enter 0 for no discount.</small>
                            @error('discount_percent')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Status Field -->
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status" required>
                                <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="col-12">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                rows="3">{{ old('description', $item->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload Field -->
                        <div class="col-md-12">
                            <label for="image" class="form-label">Update Item Image (Optional)</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" accept="image/*" onchange="previewImage(event)">
                            <small class="form-text text-muted">Leave blank to keep the current image.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div class="col-md-12">
                            @php
                                $imageSrc = $item->image ? asset('storage/' . $item->image) : '#';
                                $imageDisplay = $item->image ? 'block' : 'none';
                            @endphp
                            <img id="imagePreview" src="{{ $imageSrc }}" alt="Image Preview" class="rounded"
                                style="display: {{ $imageDisplay }}; width: 100px; height: 100px; object-fit: cover;" />
                        </div>


                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update item</button>
                            <a href="{{ route('items.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection