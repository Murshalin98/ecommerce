@extends('backend.master')
@section('breadcrumb')
    Category
@endsection

@section('category')
    active
@endsection

@section('content')

@can('image view')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-10">
                <h5>Category List</h5>
            </div>
            <div class="col-2">
                <a class="btn btn-danger btn-block mg-b-10 text-light" href="{{ route('CategoryAllDelete') }}">All Delete</a>
            </div>
        </div>
    </div>

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

      <h6 class="card-body-title">Total Category ({{ $count }})</h6>

      <div class="table-responsive">
        <table class="table table-bordered mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Category Name</th>
              <th>Link Slug</th>
              <th>Created Time</th>
              <th class="text-center">Edit</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $key => $item)
            <tr>
                <td>{{ $categories->firstItem() + $key }}</td>
                <td>{{ $item->category_name ?? '' }}</td>
                <td>{{ $item->slug ?? ''}}</td>
                <td>{{ $item->created_at !=null ? $item->created_at->diffforhumans() : 'N/A' }}</td>
                <td class="text-center"><a href="{{ url('/category/edit/'. $item->id) }}" class="btn-sm">Edit</a></td>
                @can('image view')
                <td class="text-center"><a href="{{ url('/category/delete/'. $item->id) }}" class="btn-sm">Delete</a></td>
                @endcan
            </tr>
            @empty
                <tr>
                    <td> No data Available </td>
                </tr>
            @endforelse
          </tbody>
        </table>
        {{ $categories->links() }}
      </div><!-- table-responsive -->
    </div><!-- card -->
</div>
@else
<h1>You are not allow this part</h1>
@endcan
@endsection
