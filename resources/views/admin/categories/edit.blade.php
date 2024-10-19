@extends('admin.layout')

@section('title', 'Category')

@section('content')

    <x-sidebar />



    <div id="main">

        <div class="page-content">

        <section>
        
                <h1 class="mb-4 text-center">Edit Categories</h1>
                <div class="row align-items-center justify-content-center">
                    <!-- تم تعديل الفورم لاستخدام PATCH للتحديث -->
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data" class="w-75">
                        @csrf
                        @method('PATCH') <!-- لجعل الطلب تحديث -->

                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <!-- Name input -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image input -->
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-bold">description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $category->description) }}">
                                    @error('description')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror

                                    <!-- عرض الصورة الحالية إذا كانت موجودة -->
                                   
                                </div>

                            
                            </div>
                        </div>
                    </form>
                </div>
           
        </section>

        </div>
        
    </div>


@endsection


