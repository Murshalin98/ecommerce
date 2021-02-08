@extends('backend.master')

@section('subcategory')
    active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Sub Category List</h5>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">
        @if (session('restore'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Warning! </strong>{{ session('restore') }}</span>
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
        <span><strong>Warning! </strong>{{ session('destroy') }}</span>
        </div>
    </div>
    @endif

      <h6 class="card-body-title">Total {{ $scat_count ?? '' }} Sub Category</h6>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Create Time</th>
            <th class="text-center">Action</th>
            <th class="text-center">Permanently</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($scat_trash as $key => $scatt)
          <tr>
            <th scope="row">{{ $scat_trash->firstItem() + $key }}</th>
            <td>{{ $scatt->subcategory_name }}</td>
            <td>{{ $scatt->get_category->category_name ?? 'N/A'}}</td>
            <td>{{ $scatt->slug }}</td>
            <td>{{ $scatt->deleted_at->diffForHumans() }}</td>
            <td class="text-center"><a href="{{ url('/sub-category/restore/'. $scatt->id) }}" class="btn-sm">Restore</a></td>
            <td class="text-center"><a href="{{ url('/sub-category/destroy/'. $scatt->id) }}" class="btn-sm">Destroy</a></td>
          </tr>
          @empty
            <tr>
                <td> No data Available </td>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $scat_trash->links() }}
    </div><!-- card -->
</div>
@endsection
