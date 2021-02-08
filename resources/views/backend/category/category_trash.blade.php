@extends('backend.master')
@section('breadcrumb')
    Category
@endsection

@section('category')
    active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-10">
                <h5>Trashed Category</h5>
            </div>
            <div class="col-2">
                <a class="btn btn-danger btn-block mg-b-10 text-light" href="{{ route('CategoryEmpty') }}">Empty Trash</a>
            </div>
        </div>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">
        @if (session('restore'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done!</strong> {{ session('restore') }}</span>
            </div>
        </div>
        @endif

        @if (session('destroy'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-close alert-icon tx-24"></i>
                <span><strong>Oh snap!</strong> {{ session('destroy') }}</span>
            </div>
        </div>
        @endif

        @if (session('empty'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Trash Empty!</strong> {{ session('empty') }}</span>
            </div>
        </div>
        @endif

      <h6 class="card-body-title">Total Trashed Category {{ $tcount ?? ''}}</h6>

      <div class="table-responsive">
        <table class="table table-bordered mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Category Name</th>
              <th>Link Slug</th>
              <th>Deleted Time</th>
              <th class="text-center">Action</th>
              <th class="text-center">Permanently</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($trashed_cat as $key => $tcat)
            <tr>
                <td>{{ $trashed_cat->firstItem() + $key }}</td>
                <td>{{ $tcat->category_name ?? '' }}</td>
                <td>{{ $tcat->slug ?? ''}}</td>
                <td>{{ $tcat->created_at !=null ? $tcat->deleted_at->diffforhumans() : 'N/A' }}</td>
                <td class="text-center"><a href="{{ url('/category/restore/'. $tcat->id) }}" class="btn-sm">Restore</a></td>
                <td class="text-center"><a href="{{ url('/category/destroy/'. $tcat->id) }}" class="btn-sm">Destroy</a></td>
            </tr>
            @empty
                <tr>
                    <td> No data Available </td>
                </tr>
            @endforelse
          </tbody>
        </table>
        {{ $trashed_cat->links() }}
      </div>
    </div>
</div>

@endsection
