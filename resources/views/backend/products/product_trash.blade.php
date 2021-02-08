@extends('backend.master')
@section('breadcrumb')
    Products
@endsection

@section('products')
    active
@endsection

@section('content')

<div class="sl-pagebody">

    <div class="card pd-10 pd-sm-20 mg-t-0">

    @if (session('restore'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done! </strong>{{ session('restore') }}</span>
        </div>
    </div>
    @endif

    @if (session('destroy'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Oh! </strong>{{ session('destroy') }}</span>
        </div>
    </div>
    @endif

      <h6 class="card-body-title">Trashed {{ $countPT ?? '' }} Products</h6>

      <div class="table-responsive">
        <table class="table table-bordered mg-b-0 mb-3 mt-2">
          <thead>
            <tr>
              <th>SL</th>
              <th>Title</th>
              <th>Price</th>
              <th>C Name</th>
              <th>SC Name</th>
              <th>Slug</th>
              <th class="text-center">Quantity</th>
              <th>Summary</th>
              <th>Description</th>
              <th>Image</th>
              <th>Created</th>
              <th>Deleted</th>
              <th class="text-center">Restore</th>
              <th class="text-center">Destroy</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($Ptrash as $key => $trash)
            <tr>
                <th>{{ $Ptrash->firstItem() + $key }}</th>
                <td>{{ $trash->title }}</td>
                <td>{{ $trash->price }}</td>
                <td>{{ $trash->category_id }}</td>
                <td>{{ $trash->subcategory_id }}</td>
                <td>{{ $trash->slug }}</td>
                <td class="text-center">{{ $trash->quantity }}</td>
                <td>{{ $trash->summary }}</td>
                <td>{{ $trash->description }}</td>
                <td><img width="100" src="{{ asset('products/thumbnail/'. $trash->thumbnail) }}" alt="{{ $trash->title }}"></td>
                <td>{{ $trash->created_at->diffForHumans() }}</td>
                <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                <td class="text-center"><a href="{{ route('ProductsRestore', $trash->id) }}" class="btn btn-outline-info">Restore</a></td>
                <td class="text-center"><a href="{{ route('ProductsDestroy', $trash->id) }}" class="btn btn-outline-danger">Destroy</a></td>
            </tr>
            @empty
            <tr>
                <td>None</td>
                <td>No Available Product</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        {{ $Ptrash->links() }}
      </div>
    </div>
</div>
@endsection
