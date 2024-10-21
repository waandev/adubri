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
                        <!-- Total Complaints -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card bg-primary">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white">{{ $totalComplaint }}</h3>
                                                <span>Total Pengaduan</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="bx bxs-file-doc text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Answered Complaints -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card bg-success">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white">{{ $totalAnswered }}</h3>
                                                <span>Pengaduan Telah Terjawab</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="bx bxs-check-circle text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Unanswered Complaints -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card bg-danger">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-white text-left">
                                                <h3 class="text-white">{{ $totalUnanswered }}</h3>
                                                <span>Pengaduan Belum Terjawab</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="bx bxs-error text-white font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The rest of your code remains unchanged -->
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
                                            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay">
                                                <canvas id="dayChart"></canvas>
                                            </div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek">
                                                <canvas id="weekChart"></canvas>
                                            </div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth">
                                                <canvas id="monthChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="chart-stats text-center my-5">
                                @forelse ($categories as $category)
                                    @php
                                        $complaintsCount = $category->complaints_count; // Jumlah aduan untuk kategori ini
                                        $percentage =
                                            $totalComplaint > 0 ? ($complaintsCount / $totalComplaint) * 100 : 0; // Menghitung persentase
                                    @endphp
                                    <div
                                        class="card {{ $category->name == 'Product' ? 'bg-gradient-directional-warning' : ($category->name == 'E-Channel' ? 'bg-gradient-directional-cyan' : 'bg-gradient-directional-primary') }}">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-white text-left">
                                                        <h3 class="text-white">{{ $complaintsCount }}</h3>
                                                        <span>{{ $category->name }}</span>
                                                    </div>
                                                    <div class="percentage">
                                                        <span>{{ number_format($percentage) }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-warning">No categories found.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-xl col-lg-12 col-md-12">
                            <!-- Adjusted the column size to accommodate more headers -->
                            <div class="card recent-loan">
                                <div class="card-header">
                                    <h4 class="text-center">Pengaduan Terbaru</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table id="aduan" class="table table-sm table-white-space table-hover mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Waktu</th>
                                                    <th class="border-top-0">Kategori</th>
                                                    <th class="border-top-0">Layanan</th>
                                                    <th class="border-top-0">Deskripsi Aduan</th>
                                                    <th class="border-top-0">Tanggal Kejadian</th>
                                                    <th class="border-top-0">Feedback</th>
                                                    <th class="border-top-0">Admin</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($latestComplaints as $index => $complaint)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Makassar')->format('d-m-Y H:i:s') }}
                                                            WITA</td>
                                                        <td>{{ $complaint->category->name ?? 'N/A' }}</td> <!-- Kategori -->
                                                        <td>{{ $complaint->service->name ?? 'N/A' }}</td> <!-- Layanan -->
                                                        <td>{{ $complaint->description }}</td> <!-- Deskripsi Aduan -->
                                                        <td>{{ \Carbon\Carbon::parse($complaint->date_of_incident)->timezone('Asia/Makassar')->format('d-m-Y') }}
                                                        </td>
                                                        <td> {{ $complaint->feedback->feedback ?? '' }}
                                                        </td>
                                                        <td> {{ $complaint->feedback->user->name ?? '' }}</td>
                                                        <td>
                                                            <a href="{{ route('backsite.aduan.show', $complaint->id) }}"
                                                                class="btn btn-info btn-sm">Detail</a> <!-- Aksi -->
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak ada pengaduan terbaru.
                                                        </td> <!-- Adjusted colspan for new columns -->
                                                    </tr>
                                                @endforelse
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch data from backend
        fetch('/backsite/get-complaint-data')
            .then(response => response.json())
            .then(data => {
                // Day Chart
                const dayCtx = document.getElementById('dayChart').getContext('2d');
                new Chart(dayCtx, {
                    type: 'line',
                    data: {
                        labels: data.daily.map(item => item.date),
                        datasets: [{
                            label: 'Complaints',
                            data: data.daily.map(item => item.total),
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false,
                        }]
                    }
                });

                // Week Chart
                const weekCtx = document.getElementById('weekChart').getContext('2d');
                new Chart(weekCtx, {
                    type: 'line',
                    data: {
                        labels: data.weekly.map(item => `Week ${item.week}`),
                        datasets: [{
                            label: 'Complaints',
                            data: data.weekly.map(item => item.total),
                            borderColor: 'rgba(153, 102, 255, 1)',
                            fill: false,
                        }]
                    }
                });

                // Month Chart
                const monthCtx = document.getElementById('monthChart').getContext('2d');
                new Chart(monthCtx, {
                    type: 'line',
                    data: {
                        labels: data.monthly.map(item => `Month ${item.month}`),
                        datasets: [{
                            label: 'Complaints',
                            data: data.monthly.map(item => item.total),
                            borderColor: 'rgba(255, 159, 64, 1)',
                            fill: false,
                        }]
                    }
                });
            });
    </script>
@endpush
