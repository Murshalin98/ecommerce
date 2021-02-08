@extends('backend.master')

@section('role')
active
@endsection

@section('content')

{{-- Role & Permission --}}
<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>Role & Permission</h5>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add </button> --}}
            </div>
        </div>
    </div>

    <div class="card pd-10 pd-sm-20 mg-t-0">
        <h6 class="card-body-title">Total Role {{$roles->count()}}</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Assigned Permissions</th>
                        <th scope="col">Created Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$role->name}}</td>
                        <td>
                            <ul>
                                @foreach ($role->getPermissionNames() as $permit)
                                    <li>{{$permit}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$role->created_at->diffforhumans() ?? ''}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No data Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{$permissions->links()}} --}}
        </div>
    </div>
</div>

{{-- Assain Role --}}
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Assain Permission</h5>
    </div>
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="col-md-12">
            <form action="{{route('RoleAddtoPermission')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <select class="form-control" name="role_name">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        @foreach ($permissions as $permit)
                            <li>
                                <input id="permission_name{{$permit->id}}" type="checkbox" name="permission_name[]" value="{{$permit->name}}">
                                <label for="permission_name{{$permit->id}}">{{$permit->name}}</label>
                            </li>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

{{-- User List --}}
<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>User List</h5>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add </button> --}}
            </div>
        </div>
    </div>

    <div class="card pd-10 pd-sm-20 mg-t-0">
        <h6 class="card-body-title">Total User {{$users->count()}}</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Role Assign</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Created Time</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$user->name}}</td>
                        <td>
                            <ul>
                                @foreach ($user->getRoleNames() as $permit)
                                    <li>{{$permit}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($user->getAllPermissions() as $permit)
                                    <li>{{$permit->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$role->created_at->diffforhumans() ?? ''}}</td>
                        <td class="text-center">
                            <a href="{{route('EditUserPermission', $user->id)}}" class="btn btn-outline-info">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No data Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{$permissions->links()}} --}}
        </div>
    </div>
</div>

{{-- Assain Role to User --}}
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Assain Role to User</h5>
    </div>
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="col-md-12">
            <form action="{{route('RoleAddtoUser')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <select class="form-control" name="user_id">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <select class="form-control" name="role_name">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Assain</button>
            </form>
        </div>
    </div>
</div>
@endsection
