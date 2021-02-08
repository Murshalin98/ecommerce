@extends('backend.master')

@section('subcategory')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Add Sub Category</h5>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">

        @if(session('insert'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done! </strong>{{ session('insert') }}. Check <a href="{{ route('SubCategory') }}"><b>SubCategories List</b></a></span>
                </div>
            </div>
        @endif

        <div class="col-3">
            <form action="{{ url('sub-category/update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $scats->id }}" name="subcategory_id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="name" value="{{ $scats->subcategory_name ?? old('subcategory_name') }}" placeholder="Homes & Gardens">

                    @error('subcategory_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <select class="form-control" name="category_id">
                        <option>Select Category</option>
                        @foreach ($categories as $item)
                        <option @if ($scats->category_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection




{{-- @extends('layouts.app')

@section('subcategory')
    active
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Sub Category List') }}</b></div>

                <div class="card-body">

                    @if(session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('delete') }}
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $key => $scat)
                            <tr>
                                <th scope="row">{{ $subcategories->firstItem() + $key }}</th>
                                <td>{{ $scat->subcategory_name }}</td>
                                <td>{{ $scat->get_category->category_name }}</td>
                                <td>{{ $scat->slug }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/sub-category/edit/'. $scat->id) }}" class="btn btn-outline-info">Edit</a>
                                    <a href="{{ url('/sub-category/delete/'. $scat->id) }}" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $subcategories->links() }}

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Category Add') }}</b></div>

                @if(session('insert'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('insert') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ url('sub-category/post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="name" value="{{ $scats->subcategory_name ?? old('subcategory_name') }}" placeholder="Homes & Gardens">

                        @error('subcategory_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id">
                            <option>Select Category</option>
                            @foreach ($subcategories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
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
