@extends('backend.master')
@section('breadcrumb')
    Blog
@endsection

@section('blog')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="row">
            <div class="col-10">
                <h5>Blog List</h5>
            </div>
            <div class="col-2">
                <a class="btn btn-info btn-block mg-b-10 text-light" href="{{route('blog.create')}}">Create an Blog</a>
            </div>
        </div>
    </div>

    <div class="card pd-20">
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

      <h6 class="card-body-title">Total Blog ($count }})</h6>

      <div class="table-responsive">
        <table class="table table-bordered mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Details</th>
              <th>Thumbnail</th>
              <th>Featured</th>
              <th>Views</th>
              <th>Since</th>
              <th class="text-center">Edit</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($blogs as $key => $blog)
            <tr>
                <td>{{$blogs->firstItem() + $key}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                <td>{{$blog->body}}</td>
                <td>{{$blog->thumbnail}}</td>
                <td>{{$blog->featured_image}}</td>
                <td>{{$blog->views}}</td>
                <td>{{$blog->created_at !=null ? $blog->created_at->diffforhumans() : 'N/A'}}</td>
                <td class="text-center"><a href="" class="btn-sm">Edit</a></td>
                <td class="text-center"><a href="" class="btn-sm">Delete</a></td>
            </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="10"> No Blog Available </td>
                </tr>
            @endforelse
          </tbody>
        </table>
        {{ $blogs->links() }}
      </div><!-- table-responsive -->
    </div><!-- card -->
</div>
@endsection
