@extends('admin.layout')

@section('title', 'Users')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
            <section>
                
                <h1 class="mb-4">Users</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">User List</h5>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add New User
                        </a>
                    </div>
                    <div class="card-body">
                       <div class="table-responsive overflow-auto border" style="height: 65vh">
                        <table class="table table-hover table-bordered" >
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th> <!-- عمود الحالة -->
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $user->status == 'active' ? 'btn-success' : 'btn-danger' }}" style="border-radius: 20px;">
                                                {{ ucfirst($user->status) }}
                                            </button>
                                        </td>
                                        
                                        
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">    
                                                <i>UPDATE</i>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i >DELETE</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                       </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
