@extends('admin.layout')

@section('title', 'Users')

@section('content')

    <x-sidebar />
    <div id="main">

        <div class="page-content">
            <section>
                <div class="container my-5 ">
                    <div class="row align-items-center justify-content-center ">
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
                                </div>

                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- إضافة حقل تأكيد كلمة المرور -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="">Select a status</option>
                                            @foreach (['active' => 'Active', 'inactive' => 'Inactive'] as $value => $label)
                                                <option value="{{ $value }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
