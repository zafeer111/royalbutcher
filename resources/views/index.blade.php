@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('content')
<!-- START: Header -->
<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
    </div>
</div>
<!-- END: Header -->

<!-- start row -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="row g-3">

            <!-- Stat Card 1: Website Traffic -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-14 mb-1 text-muted">Website Traffic</div> <!-- Design Change: text-muted -->
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">91.6K</div>
                                    <div class="me-auto">
                                        <span class="text-primary d-inline-flex align-items-center">
                                            15%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Design Change: Added styled icon -->
                            <div class="bg-primary-subtle text-primary p-2 rounded-circle">
                                <i data-feather="globe" style="height: 24px; width: 24px;"></i>
                            </div>
                        </div>
                        <div id="website-visitors" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 2: Conversion rate -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-14 mb-1 text-muted">Conversion rate</div> <!-- Design Change: text-muted -->
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">15%</div>
                                    <div class="me-auto">
                                        <span class="text-danger d-inline-flex align-items-center">
                                            10%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Design Change: Added styled icon -->
                            <div class="bg-danger-subtle text-danger p-2 rounded-circle">
                                <i data-feather="percent" style="height: 24px; width: 24px;"></i>
                            </div>
                        </div>
                        <div id="conversion-visitors" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 3: Session duration -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-14 mb-1 text-muted">Session duration</div> <!-- Design Change: text-muted -->
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">90 Sec</div>
                                    <div class="me-auto">
                                        <span class="text-success d-inline-flex align-items-center">
                                            25%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Design Change: Added styled icon -->
                            <div class="bg-success-subtle text-success p-2 rounded-circle">
                                <i data-feather="clock" style="height: 24px; width: 24px;"></i>
                            </div>
                        </div>
                        <div id="session-visitors" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <!-- Stat Card 4: Active Users -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-14 mb-1 text-muted">Active Users</div> <!-- Design Change: text-muted -->
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">2,986</div>
                                    <div class="me-auto">
                                        <span class="text-success d-inline-flex align-items-center">
                                            4%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Design Change: Added styled icon -->
                            <div class="bg-info-subtle text-info p-2 rounded-circle">
                                <i data-feather="users" style="height: 24px; width: 24px;"></i>
                            </div>
                        </div>
                        <div id="active-users" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end sales -->
</div> <!-- end row -->

<!-- Start Monthly Sales -->
<div class="row">
    <div class="col-md-6 col-xl-8">
        <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
            
            <!-- Design Change: Added bg-white, py-3, updated icon container -->
            <div class="card-header bg-white py-3"> 
                <div class="d-flex align-items-center">
                    <div class="bg-primary-subtle rounded-2 me-2 widget-icons-sections p-2">
                        <i data-feather="bar-chart" class="widgets-icons text-primary"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-semibold">Monthly Sales</h5> <!-- Design Change: fw-semibold -->
                </div>
            </div>

            <div class="card-body">
                <div id="monthly-sales" class="apex-charts"></div>
            </div>
            
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card overflow-hidden shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->

            <!-- Design Change: Added bg-white, py-3, updated icon container -->
            <div class="card-header bg-white py-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success-subtle rounded-2 me-2 widget-icons-sections p-2">
                        <i data-feather="tablet" class="widgets-icons text-success"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-semibold">Best Traffic Source</h5> <!-- Design Change: fw-semibold -->
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- Design Change: Added table-hover, align-middle -->
                    <table class="table table-traffic table-hover align-middle mb-0">
                        <tbody>
                            <!-- Design Change: Added table-light -->
                            <thead class="table-light">
                                <tr>
                                    <th>Network</th>
                                    <th colspan="2">Visitors</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>Instagram</td>
                                <td>3,550</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-danger" style="width: 80.0%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Facebook</td>
                                <td>1,245</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-primary" style="width: 55.9%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Twitter</td>
                                <td>1,798</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-secondary" style="width: 67.0%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>YouTube</td>
                                <td>986</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-success" style="width: 38.72%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Pinterest</td>
                                <td>854</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-danger" style="width: 45.08%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Linkedin</td>
                                <td>650</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-warning" style="width: 68.0%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Nextdoor</td>
                                <td>420</td>
                                <td class="w-50">
                                    <div class="progress progress-md mt-0">
                                        <div class="progress-bar bg-info" style="width: 56.4%"></div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Monthly Sales -->

<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
            
            <!-- Design Change: Added bg-white, py-3, updated icon container -->
            <div class="card-header bg-white py-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning-subtle rounded-2 me-2 widget-icons-sections p-2">
                        <i data-feather="minus-square" class="widgets-icons text-warning"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-semibold">Audiences By Time Of Day</h5> <!-- Design Change: fw-semibold -->
                </div>
            </div>

            <div class="card-body">
                <div id="audiences-daily" class="apex-charts mt-n3"></div>
            </div>
            
        </div>
    </div>

    <div class="col-md-6 col-xl-6">
        <div class="card overflow-hidden shadow-sm border-0"> <!-- Design Change: Added shadow-sm, border-0 -->
            
            <!-- Design Change: Added bg-white, py-3, updated icon container -->
            <div class="card-header bg-white py-3">
                <div class="d-flex align-items-center">
                    <div class="bg-info-subtle rounded-2 me-2 widget-icons-sections p-2">
                        <i data-feather="table" class="widgets-icons text-info"></i>
                    </div>
                    <h5 class="card-title mb-0 fw-semibold">Most Visited Pages</h5> <!-- Design Change: fw-semibold -->
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- Design Change: Added table-hover, align-middle -->
                    <table class="table table-traffic table-hover align-middle mb-0">
                        <tbody>

                            <!-- Design Change: Added table-light -->
                            <thead class="table-light">
                                <tr>
                                    <th>Page name</th>
                                    <th>Visitors</th>
                                    <th>Unique</th>
                                    <th colspan="2">Bounce rate</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    /home
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>5,896</td>
                                <td>3,654</td>
                                <td>82.54%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-1" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /about.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>3,898</td>
                                <td>3,450</td>
                                <td>76.29%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-2" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /index.html 
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>3,057</td>
                                <td>2,589</td>
                                <td>72.68%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-3" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /invoice.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>867</td>
                                <td>795</td>
                                <td>44.78%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-4" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /docs/
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>958</td>
                                <td>801</td>
                                <td>41.15%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-5" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /service.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>658</td>
                                <td>589</td>
                                <td>32.65%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-6" class="apex-charts"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    /analytical.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <i data-feather="link" class="ms-1 text-primary" style="height: 15px; width: 15px;"></i>
                                    </a>
                                </td>
                                <td>457</td>
                                <td>859</td>
                                <td>32.65%</td>
                                <td class="w-25">
                                    <div id="sparkline-bounce-7" class="apex-charts"></div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
    @vite(['resources/js/pages/analytics-dashboard.init.js'])
@endsection