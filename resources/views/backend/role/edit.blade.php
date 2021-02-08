@extends('backend.master')

@section('role')
active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>Edit Permission to {{$user->name}}</h5>
            </div>
        </div>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="col-md-12">
            <form action="{{route('PermissionChangeUser')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$user->id}}" name="user_id">
                <div class="row">
                    <ul>
                        <label for="ckbox">
                            @foreach ($permissions as $permission)
                                <li>
                                    <input type="checkbox" {{$user->hasPermissionTo($permission->name) ? 'checked':''}} name="permissions[]" value="{{$permission->name}}"><span> {{$permission->name}}</span>
                                </li>
                            @endforeach
                        </label>
                    </ul>
                </div>

                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
