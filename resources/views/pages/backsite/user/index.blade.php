@extends('layouts.app')

@section('title', 'User')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">List User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User</a>
                                </li>
                                <li class="breadcrumb-item active">List User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                {{-- add card --}}

                <div class="content-body">
                    <section id="add-home">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <a data-action="collapse">
                                            <h4 class="card-title text-white">Tambah Data</h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-content collapse hide">
                                        <div class="card-body card-dashboard">

                                            <form class="form form-horizontal" action="{{ route('backsite.user.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silakan lengkapi input <code>required</code> sebelum Anda
                                                            mengklik tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="name">Nama <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" placeholder="contoh: Andrianto Suhardi"
                                                                value="{{ old('name') }}" autocomplete="off" required>
                                                            @if ($errors->has('name'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('name') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="name">Email <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="email" name="email"
                                                                class="form-control"
                                                                placeholder="contoh: andri@brita3813.com"
                                                                value="{{ old('email') }}" autocomplete="off" required>
                                                            @if ($errors->has('email'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('email') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="role_id">Role
                                                            <code style="color: red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <select name="role_id" id="role_id" class="form-control">
                                                                    <option value="{{ '' }}" disabled selected>
                                                                        Pilih Role
                                                                    </option>
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('role_id'))
                                                                    <p style="font-style: bold; color: red;">
                                                                        {{ $errors->first('role_id') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions text-right">
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                        onclick="return confirm('Are you sure want to save this data ?')">
                                                        <i class="la la-check-square-o"></i> Submit
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>

                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Detail User
                                    </h4>
                                </div>
                                <div class="card-body mt-1">
                                    <div class="table-responsive">
                                        <table id="users" class="table alt-pagination table-striped table-wrapper">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Nama</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Role</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Aksi</th>
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
                                                            <div
                                                                class="ac-status badge {{ $user->verification->is_verified == 1 ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                                {{ $user->verification->is_verified == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="action">
                                                                @if ($user->id !== Auth::id())
                                                                    <div class="badge badge-info round">
                                                                        <a href="{{ route('backsite.user.edit', $user->id) }}"
                                                                            class="text-white">
                                                                            <i
                                                                                class="font-medium-2 icon-line-height la la-pencil-square"></i>
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <div class="badge badge-secondary round">
                                                                        <i
                                                                            class="font-medium-2 icon-line-height la la-pencil-square"></i>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @empty
                                                    {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot style="display: none">
                                                <tr>
                                                    <th class="border-top-0">Nama</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Role</th>
                                                    <th class="border-top-0">Status</th>
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
