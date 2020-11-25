@extends('admin.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="card mt-4">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Group</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="">{{ $user->group->name }}</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure?')" href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
