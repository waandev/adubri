@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <section id="bank-cards" class="bank-cards">
                    <div class="row match-height">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5 text-left">
                                                <h3 class="mb-0">$1.2K</h3>
                                                <p class="text-light">per Ounce</p>
                                                <h4 class="warning mt-1 text-bold-500">Gold</h4>
                                            </div>
                                            <div class="col-7">
                                                <div class="float-right">
                                                    <canvas id="gold-chart" class="height-75"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5 text-left">
                                                <h3 class="mb-0">$14.66</h3>
                                                <p class="text-light">per Ounce</p>
                                                <h4 class="info mt-1 text-bold-500">Silver</h4>
                                            </div>
                                            <div class="col-7">
                                                <div class="float-right">
                                                    <canvas id="silver-chart" class="height-75"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5 text-left">
                                                <h3 class="mb-0">$0.88</h3>
                                                <p class="text-light">per Unit</p>
                                                <h4 class="danger mt-1 text-bold-500">USD</h4>
                                            </div>
                                            <div class="col-7">
                                                <div class="float-right">
                                                    <canvas id="euro-chart" class="height-75"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5 text-left">
                                                <h3 class="mb-0">$6.5K</h3>
                                                <p class="text-light">per unit</p>
                                                <h4 class="success mt-1 text-bold-500">EURO</h4>
                                            </div>
                                            <div class="col-7">
                                                <div class="float-right">
                                                    <canvas id="bitcoin-chart" class="height-75"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent">
                                            <h4 class="card-title">Grafik Aduan</h4>
                                            <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group"
                                                role="group">
                                                <li class="nav-item">
                                                    <a class="active nav-link" data-toggle="tab"
                                                        href="#scoreLineToDay">Day</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="widget-content tab-content bg-white p-20">
                                            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="chart-stats text-center my-5">

                                @forelse ($categories as $key => $category)
                                    <div
                                        class="card {{ $category->name == 'Product'
                                            ? 'bg-gradient-directional-warning'
                                            : ($category->name == 'E-Channel'
                                                ? 'bg-gradient-directional-cyan'
                                                : 'bg-gradient-directional-primary') }}">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-white text-left">
                                                        <h3 class="text-white"></h3>
                                                        <span>{{ $category->name }}</span>
                                                    </div>
                                                    <div class="percentage">
                                                        <span>%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    {{-- not found --}}
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="row match-height">

                        <div class="col-xl col-lg-6 col-md-12">
                            <div class="card recent-loan">
                                <div class="card-header">
                                    <h4 class="text-center">Pengaduan Terbaru</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table id="aduan" class="table table-sm table-white-space table-hover mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Waktu</th>
                                                    <th class="border-top-0">Tujuan</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>
@endsection

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        $(document).ready(function() {
            $('#aduan').DataTable({
                lengthChange: false,
                responsive: true,
                searching: false,
                info: false,
                paging: false
            });
        });
    </script>
@endpush
