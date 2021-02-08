@extends('backend.master')

@section('subcategory')
    active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Sub Category List</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40 mg-t-50">
        @if (session('delete'))
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Warning! </strong>{{ session('delete') }}</span>
            </div>
        </div>
        @endif

        @if (session('update'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Updated! </strong>{{ session('update') }}</span>
            </div>
        </div>
        @endif

      <h6 class="card-body-title">Total Sub Category ({{ $scat_count }})</h6>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Create Time</th>
            <th scope="col">Update Time</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($subcategories as $key => $scat)
          <tr>
            <th scope="row">{{ $subcategories->firstItem() + $key }}</th>
            <td>{{ $scat->subcategory_name }}</td>
            <td>{{ $scat->get_category->category_name ?? ''}}</td>
            <td>{{ $scat->slug }}</td>
            <td>{{ $scat->created_at->diffForHumans() }}</td>
            <td>{{ $scat->updated_at != null ? $scat->updated_at->diffForHumans() : 'N/A'}}</td>
            <td class="text-center"><a href="{{ url('/sub-category/edit/'. $scat->id) }}" class="btn-sm">Edit</a></td>
            <td class="text-center"><a href="{{ url('/sub-category/delete/'. $scat->id) }}" class="btn-sm">Delete</a></td>
          </tr>
          @empty
            <tr>
                <td> No data Available </td>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $subcategories->links() }}
    </div><!-- card -->
</div>
@endsection





{{-- @extends('layouts.app')

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
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection --}}
