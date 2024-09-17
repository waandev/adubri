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
                    <h3 class="content-header-title">Profil</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Konfigurasi</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ route('backsite.profil.index') }}">Profil</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section>

                    <div class="card">
                        <div class="card-body d-flex justify-content-around">

                            <div class="text-center">
                                @php
                                    $photoUrl = Auth::user()->profile_photo_path
                                        ? request()->getSchemeAndHttpHost() .
                                            '/storage' .
                                            '/' .
                                            Auth::user()->profile_photo_path
                                        : null;
                                    $nameInitial = strtoupper(substr(Auth::user()->name, 0, 1));
                                @endphp
                                <img src="{{ $photoUrl ?? 'https://via.placeholder.com/150/000000/FFFFFF?text=' . $nameInitial }}"
                                    alt="{{ Auth::user()->profile_photo_path ? '' : Auth::user()->name }}"
                                    class="card-img-top mb-1 patient-img img-fluid rounded-circle">
                                <h4>{{ Auth::user()->name }}</h4>

                                <div class="text-center">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5>Role : {{ Auth::user()->role_user->role->name }}</h5>
                                        </li>
                                        <li>
                                            <h5>Email: {{ Auth::user()->email }}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{ route('backsite.profil.edit', Auth::user()->id) }}"
                                    class="btn btn-primary w-100">Edit</a>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
