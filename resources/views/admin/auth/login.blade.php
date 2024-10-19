@extends('admin.layout')
  
@section('title', 'Login')

@section('content')

    <div id="auth">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4">

                <div id="auth-left" style="padding: 2rem ; margin-top: 60px;">

                    <!-- Logo Section -->
                    <div class="mb-4 text-center">
                        <a href="{{ url('/admin') }}">
                            <img src="{{ url('assets/compiled/images/logo.jpeg') }}" width="160" alt="Logo">
                        </a>
                    </div>

                    <!-- Login Title -->
                    <h4 class="auth-title text-center">Log in</h4>

                    <!-- Login Form -->
                    <form action="/admin/auth" method="POST">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" placeholder="Username" value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            <!-- Error Handling for Email -->
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                            <!-- Error Handling for Password -->
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </form>

                </div>
            </div>

            <!-- Footer Section -->
            <div class="copywrite text-center mt-3">
                <p class="mb-0">
                    Powered by <a href="https://camilleschori.com/" target="_blank">SC-Soft</a> | All Rights Reserved © {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>

@endsection
