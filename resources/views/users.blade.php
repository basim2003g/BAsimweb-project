@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Users List App</h1>

    <div class="offset-md-2 col-md-8">

        <div class="card">

            @if (isset($user))

                <div class="card-header">
                    Update User
                </div>

                <div class="card-body">

                    <form action="{{ url('users/update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" name="email" id="user-email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="user-password" class="form-label">Password</label>
                            <input type="password" name="password" id="user-password" class="form-control" placeholder="Leave empty if you do not want to change password">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                Update User
                            </button>
                        </div>

                    </form>

                </div>

            @else

                <div class="card-header">
                    New User
                </div>

                <div class="card-body">

                    <form action="{{ url('users/create') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" name="name" id="user-name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" name="email" id="user-email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="user-password" class="form-label">Password</label>
                            <input type="password" name="password" id="user-password" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">
                                Add User
                            </button>
                        </div>

                    </form>

                </div>

            @endif

        </div>

        <br>

        <div class="card">

            <div class="card-header">
                Current Users
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>

                                    <form action="{{ url('users/edit/' . $user->id) }}" method="POST" style="display:inline;">
                                        @csrf

                                        <button type="submit" class="btn btn-warning btn-sm">
                                            Edit
                                        </button>
                                    </form>

                                    <form action="{{ url('users/delete/' . $user->id) }}" method="POST" style="display:inline;">
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
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

</div>

@endsection
