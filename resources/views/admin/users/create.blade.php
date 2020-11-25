@extends('admin.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="card mt-4">
            <div class="card-header">
                Thêm mới người dùng
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" value="{{ old('username') }}" class="form-control @error('username') border-danger @enderror" name="username">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <select class="form-control" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" name="roles[{{ $role->id }}]" type="checkbox"
                                       value="{{ $role->id }}" id="role-{{$role->id}}">
                                <label class="form-check-label" for="role-{{$role->id}}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
