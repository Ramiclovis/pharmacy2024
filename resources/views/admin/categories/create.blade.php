@extends('admin.layout')

@section('title', 'Categories')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
        <section>
           
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>

                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" required>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                            </div>
                        </div>
                    </form>
                </div>
          
        </section>
        </div>
    </div>


@endsection
