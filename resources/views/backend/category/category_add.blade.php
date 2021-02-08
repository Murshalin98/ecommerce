@extends('backend.master')

@section('category')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Category Add</h5>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">

        @if(session('insert'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done! </strong>{{ session('insert') }}. Check <a href="{{ route('category') }}"><b>Categories List</b></a></span>
                </div>
            </div>
        @endif

        <div class="col-3">
            <form action="{{ route('CategoryPost') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="name" placeholder="Category Name">
                    @error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Enter Slug">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
