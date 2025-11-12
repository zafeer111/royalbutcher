@extends('layouts.vertical', ['title' => 'Edit Home Page Content'])

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Home Page</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home-page-contents.index') }}">Home Page</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <!-- Form Validation -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-semibold">Edit Home Page Content</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <form class="row g-3" action="{{ route('home-page-contents.update', $homePageContent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h6 class="text-primary">Tab Texts</h6>
                        <div class="col-md-4">
                            <label for="tab_new_order" class="form-label">"New Order" Tab</label>
                            <input type="text" name="tab_new_order" class="form-control @error('tab_new_order') is-invalid @enderror"
                                id="tab_new_order" value="{{ old('tab_new_order', $homePageContent->tab_new_order) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tab_newest" class="form-label">"Newest" Tab</label>
                            <input type="text" name="tab_newest" class="form-control @error('tab_newest') is-invalid @enderror"
                                id="tab_newest" value="{{ old('tab_newest', $homePageContent->tab_newest) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tab_most_favorite" class="form-label">"Most Favorite" Tab</label>
                            <input type="text" name="tab_most_favorite" class="form-control @error('tab_most_favorite') is-invalid @enderror"
                                id="tab_most_favorite" value="{{ old('tab_most_favorite', $homePageContent->tab_most_favorite) }}" required>
                        </div>

                        <hr class="my-3">
                        <h6 class="text-primary">Section Titles</h6>

                        <div class="col-md-4">
                            <label for="title_hot_discounts" class="form-label">"Hot Discounts" Title</label>
                            <input type="text" name="title_hot_discounts" class="form-control @error('title_hot_discounts') is-invalid @enderror"
                                id="title_hot_discounts" value="{{ old('title_hot_discounts', $homePageContent->title_hot_discounts) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="title_top_picks" class="form-label">"Top Picks" Title</label>
                            <input type="text" name="title_top_picks" class="form-control @error('title_top_picks') is-invalid @enderror"
                                id="title_top_picks" value="{{ old('title_top_picks', $homePageContent->title_top_picks) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="title_for_you" class="form-label">"For You" Title</label>
                            <input type="text" name="title_for_you" class="form-control @error('title_for_you') is-invalid @enderror"
                                id="title_for_you" value="{{ old('title_for_you', $homePageContent->title_for_you) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="title_order_again" class="form-label">"Order Again" Title</label>
                            <input type="text" name="title_order_again" class="form-control @error('title_order_again') is-invalid @enderror"
                                id="title_order_again" value="{{ old('title_order_again', $homePageContent->title_order_again) }}" required>
                        </div>
                        
                        <hr class="my-3">
                        <h6 class="text-primary">Reusable Texts</h6>

                        <div class="col-md-6">
                            <label for="text_see_all" class="form-label">"See all" Text</label>
                            <input type="text" name="text_see_all" class="form-control @error('text_see_all') is-invalid @enderror"
                                id="text_see_all" value="{{ old('text_see_all', $homePageContent->text_see_all) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status" required>
                                <option value="1" {{ old('status', $homePageContent->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $homePageContent->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update form</button>
                            <a href="{{ route('home-page-contents.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection