@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="min-h-screen">
        <div class="grid lg:grid-cols-2">
            <!-- Form-->
            <div class="px-4 lg:px-[91px] pt-10 bg-[#F9FBFC]">

                <div class="flex flex-col justify-center py-14 h-screen lg:min-h-screen">
                    <h2 class="text-[#1E2B4F] text-3xl font-semibold leading-normal">
                        Pengaduan Layanan BRI
                    </h2>

                    <div class="mt-4">

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Form input -->
                        <form method="POST" action="{{ route('login') }}" class="grid gap-6">

                            {{-- token here --}}
                            @csrf

                            <label class="block">
                                <input for="email" type="email" id="email" name="email"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#012060]"
                                    placeholder="Email Address" value="{{ old('email') }}" required autofocus />

                                @if ($errors->has('email'))
                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email') }}</p>
                                @endif
                            </label>

                            <label class="block">
                                <input for="password" type="password" id="password" name="password"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#012060]"
                                    placeholder="Password" />

                                @if ($errors->has('password'))
                                    <p class="text-red mb-3 text-sm">{{ $errors->first('password') }}</p>
                                @endif
                            </label>

                            <div class="mt-10 grid gap-6">
                                <button
                                    class="text-center text-white text-lg font-medium bg-[#012060] px-10 py-4 rounded-full">
                                    Sign In
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Form -->

            <!-- Qoute -->
            <div class="hidden sm:block bg-[#FFFFFF] bg-auto bg-center bg-no-repeat"
                style="background-image: url('{{ asset('assets/auth/logo.jpeg') }}'); background-size: contain;">
                <div class="flex flex-col justify-center h-full px-24 my-auto">
                    <div class="relative">
                        <!-- Konten lainnya di sini -->
                    </div>
                </div>
            </div>
            <!-- End Qoute -->
        </div>
    </div>

@endsection
