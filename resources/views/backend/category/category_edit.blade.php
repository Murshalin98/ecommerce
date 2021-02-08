@extends('backend.master')

@section('category')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Category Update</h5>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">

        @if(session('update'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done! </strong>{{ session('update') }}. Check <a href="{{ route('category') }}"><b>Categories List</b></a></span>
                </div>
            </div>
        @endif

        <div class="col-3">
            <form action="{{ url('category-update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $cats->id }}" name="category_id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="name" placeholder="Category Name" value="{{ $cats->category_name }}">

                    @error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Enter Slug" value="{{ $cats->slug }}">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-outline-primary">Update</button>
              </form>
        </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Category List') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif

                    @if(session('update'))
                        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                            {{ session('update') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $cat)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $key }}</th>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->slug }}</td>
                                <td class="text-center">
                                <a href="{{ url('/category/edit/'. $cat->id) }}" class="btn btn-outline-info">Edit</a>
                                <a href="{{ url('/category/delete/'. $cat->slug) }}" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Category Edit') }}</b></div>

                @if(session('insert'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('insert') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ url('category-update') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $cats->id }}" name="category_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="name" value="{{ $cats->category_name ?? old('category_name') }}" placeholder="Homes & Gardens">

                        @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $cats->slug ?? old('slug') }}" placeholder="home-&-garden">

                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div class="text-center pt-2">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
