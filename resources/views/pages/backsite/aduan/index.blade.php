@extends('layouts.app')

@section('title', 'Aduan')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">List Aduan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Aduan</a>
                                </li>
                                <li class="breadcrumb-item active">List Aduan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Detail Aduan
                                    </h4>
                                    <div class="float-right">
                                        <div class="btn-group mx-2" role="group">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary btn-round"
                                                data-toggle="modal" data-target="#filterWaktu"><i
                                                    class="la la-filter"></i></button>
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-outline-secondary btn-round"><i
                                                    class="la la-print"></i></button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body mt-1">
                                    <div class="table-responsive">
                                        <table id="aduan" class="table alt-pagination table-striped table-wrapper">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Waktu</th>
                                                    <th class="border-top-0">Kategori</th>
                                                    <th class="border-top-0">Layanan</th>
                                                    <th class="border-top-0">Deskripsi Aduan</th>
                                                    <th class="border-top-0">Tanggal Kejadian</th>
                                                    <th class="border-top-0">Feedback</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($complaints as $key => $complaint)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">
                                                                {{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Makassar')->format('d-m-Y H:i:s') }}
                                                                WITA
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">{{ $complaint->category->name ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">{{ $complaint->service->name ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">{{ $complaint->description ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">
                                                                {{ \Carbon\Carbon::parse($complaint->date_of_incident)->timezone('Asia/Makassar')->format('d-m-Y') }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">
                                                                {{ $complaint->feedback->feedback ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="action">

                                                                <div class="badge badge-info round">
                                                                    <a
                                                                        href="{{ route('backsite.aduan.show', $complaint->id) }}">
                                                                        <i
                                                                            class="font-medium-2 icon-line-height la la-eye"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="badge badge-secondary round">
                                                                    <a href="">
                                                                        <i
                                                                            class="font-medium-2 icon-line-height la la-print"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot style="display: none">
                                                <tr>
                                                    <th class="border-top-0">Waktu</th>
                                                    <th class="border-top-0">Kategori</th>
                                                    <th class="border-top-0">Layanan</th>
                                                    <th class="border-top-0">Deskripsi Aduan</th>
                                                    <th class="border-top-0">Tanggal Kejadian</th>
                                                    <th class="border-top-0">Feedback</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </tfoot>
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

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }
    </style>
@endpush

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
                "order": [],
                "paging": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                "pageLength": 10,
                "responsive": true,
            });
        });
    </script>
@endpush
