@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Ganti Password</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Konfigurasi</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('backsite.ganti-password.index') }}">Ganti Password</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Silakan lengkapi input <code>required</code> sebelum Anda
                                                mengklik tombol submit.</p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('backsite.ganti-password.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Ganti Password</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="current_password">Password
                                                        Saat Ini<code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="password" id="current_password" name="current_password"
                                                            class="form-control" value="{{ old('current_password') }}"
                                                            autocomplete="off" required>
                                                        <input type="checkbox" id="showCurrentPassword"
                                                            onclick="togglePasswordVisibility('current_password')"
                                                            class="mt-1">
                                                        <label for="showCurrentPassword">Show Password</label>
                                                        @if ($errors->has('current_password'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('current_password') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="new_password">Password
                                                        Baru<code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="password" id="new_password" name="new_password"
                                                            class="form-control" value="{{ old('new_password') }}"
                                                            autocomplete="off" required>
                                                        <input type="checkbox" id="showNewPassword"
                                                            onclick="togglePasswordVisibility('new_password')"
                                                            class="mt-1">
                                                        <label for="showNewPassword">Show Password</label>
                                                        @if ($errors->has('new_password'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('new_password') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="new_password_confirmation">Konfirmasi Password Baru<code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="password" id="new_password_confirmation"
                                                            name="new_password_confirmation" class="form-control"
                                                            value="{{ old('new_password_confirmation') }}"
                                                            autocomplete="off" required>
                                                        <input type="checkbox" id="showNewPasswordConfirmation"
                                                            onclick="togglePasswordVisibility('new_password_confirmation')"
                                                            class="mt-1">
                                                        <label for="showNewPasswordConfirmation">Show Password</label>
                                                        @if ($errors->has('new_password_confirmation'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('new_password_confirmation') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.dashboard.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
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
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
@endpush
