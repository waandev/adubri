@extends('layouts.default')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Ayo Sampaikan <span>Keluhanmu!</span> </h1>
                        <h2>Solusi Terpercaya untuk Pengaduan Layanan BRI Unit Tamalate</h2>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('/assets/frontsite/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="{{ url('http://www.w3.org/2000/svg') }}"
            xmlns:xlink="{{ url('http://www.w3.org/1999/xlink') }}" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Kontak</h2>
                    <p>Kontak Kami</p>
                </div>

                <div class="info" data-aos="fade-right" data-aos-delay="100">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Jl. Hertasning Komp Ruko PT.Cahaya Surya No.2, Kota Makassar, Sulawesi Selatan 90231</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Telepon:</h4>
                        <p>(0411) 863125</p>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Form Aduan</h2>
                    <p>Kirimkan Aduan Anda</p>
                </div>

                <form action="{{ route('store') }}" method="POST" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                                value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="{{ '' }}" disabled selected>
                                    Pilih Kategori
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <select name="service_id" id="service_id" class="form-control">
                                <option value="{{ '' }}" disabled selected>
                                    Pilih Layanan
                                </option>

                            </select>
                            @if ($errors->has('service_id'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('service_id') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="col-md-4 form-group">
                            <label for="date_of_incident">Tanggal Kejadian :</label>
                            <input type="date" name="date_of_incident" id="date_of_incident" class="form-control mt-1"
                                value="{{ old('date_of_incident') }}">
                            @if ($errors->has('date_of_incident'))
                                <p style="font-style: bold; color: red;">
                                    {{ $errors->first('date_of_incident') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="description" rows="5" placeholder="Deskripsi" required>{{ old('description') }}</textarea>
                    </div>

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <p style="font-style: bold; color: red;">
                            {{ $errors->first('g-recaptcha-response') }}</p>
                    @endif
                    <div class="mt-3 text-center"><button type="submit">Kirim</button></div>
                </form>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category_id').change(function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ route('getServicesByCategory') }}", // Ganti dengan route ke controller yang menangani request ini
                        type: "GET",
                        data: {
                            category_id: categoryId
                        },
                        success: function(data) {
                            $('#service_id').empty();
                            $('#service_id').append(
                                '<option value="" disabled selected>Pilih Layanan</option>');
                            $.each(data, function(key, value) {
                                $('#service_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#service_id').empty();
                    $('#service_id').append('<option value="" disabled selected>Pilih Layanan</option>');
                }
            });
        });
    </script>
@endpush
