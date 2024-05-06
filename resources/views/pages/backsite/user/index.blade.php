@extends('layouts.app')

@section('title', 'User')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">List Users</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Users</a>
                                </li>
                                <li class="breadcrumb-item active">List Users
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
                                        Detail Users
                                    </h4>
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                            href="bank-add-account.html">
                                            <i class="ft-plus white"></i>Tambah User
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body mt-1">
                                    <div class="table-responsive">
                                        <table id="users" class="table alt-pagination table-striped table-wrapper">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Name</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Role</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($users as $key => $user)
                                                    <tr>
                                                        <td class="align-middle ">
                                                            <div class="ac-hol-name">{{ $user->name ?? '' }}</div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">{{ $user->email ?? '' }}</div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="ac-hol-name">
                                                                {{ $user->role_user->role->name ?? '' }}</div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="action">
                                                                <a href="bank-add-account.html"><i
                                                                        class="la la-pencil-square success"></i></a>
                                                                <a href="#"><i class="la la-trash danger"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot style="display: none">
                                                <tr>
                                                    <th class="border-top-0">Name</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Role</th>
                                                    <th class="border-top-0">Action</th>
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
            $('#users').DataTable({
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
