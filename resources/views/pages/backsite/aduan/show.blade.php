@extends('layouts.app')

@section('title', 'Aduan')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Detail Aduan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('backsite.aduan.index') }}">Aduan</a>
                                </li>
                                <li class="breadcrumb-item active">List Aduan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="text-alignment">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Nama Nasabah:</strong></div>
                                            <div class="col-sm-8">{{ $complaint->name }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Email Nasabah:</strong></div>
                                            <div class="col-sm-8">{{ $complaint->email }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Tanggal Kejadian:</strong></div>
                                            <div class="col-sm-8">{{ $complaint->date_of_incident }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Kategori:</strong></div>
                                            <div class="col-sm-8">{{ $complaint->category->name }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Layanan:</strong></div>
                                            <div class="col-sm-8">{{ $complaint->service->name }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4"><strong>Deskripsi Aduan:</strong></div>
                                            <div class="col-sm-8">
                                                <p class="border p-1 rounded">{{ $complaint->description }}</p>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="btn btn-outline-info"><i class="bi bi-printer"></i>
                                                Print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Feedback</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">

                                        <form class="form"
                                            action="{{ route('backsite.aduan.sendFeedback', $complaint->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label for="userinput8" class="sr-only">Feedback</label>
                                                    <textarea id="userinput8" rows="5" class="form-control" name="feedback" placeholder="Feedback">{{ $complaint->feedback->feedback }}</textarea>
                                                </div>

                                            </div>

                                            <div class="form-actions right">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="ft-check"></i> Kirim
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
