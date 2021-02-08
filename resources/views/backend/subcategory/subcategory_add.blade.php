@extends('backend.master')

@section('subcategory')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Update Sub Category</h5>
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

        <div class="card-body col-3">
            <form action="{{ url('sub-category/post') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="name" value="{{ old('subcategory_name') }}" placeholder="Homes & Gardens">

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
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>

                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
