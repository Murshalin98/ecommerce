@extends('backend.master')

@section('colors')
    active
@endsection

@section('content')

<div class="sl-pagebody">

    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>Colors</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add </button>
            </div>
        </div>
    </div>

    <div class="card pd-10 pd-sm-20 mg-t-0">
        <h6 class="card-body-title">Total Colors {{ $count ?? '' }}</h6>

        @if (session('insert'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done! </strong>{{ session('insert') }}</span>
            </div>
        </div>
        @endif

        @if (session('update'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Done! </strong>{{ session('update') }}</span>
            </div>
        </div>
        @endif

        @if (session('delete'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done! </strong>{{ session('delete') }}</span>
            </div>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Color Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($colors as $key => $color)
                <tr>
                    <th scope="row">{{ $colors->firstItem() + $key }}</th>
                    <td>{{ $color->color_name }}</td>
                    <td>{{ $color->created_at->diffforhumans() ?? ''}}</td>
                    <td>{{ $color->updated_at != null ? $color->updated_at->diffforhumans() : 'N/A' }}</td>
                    <td class="text-center"><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal{{$color->id}}">Edit</button></td>
                    <td class="text-center"><a href="{{ route('ColorsDelete', $color->id) }}" class="btn btn-outline-danger">Delete</a></td>
                </tr>
                    {{-- Color Edit Modal Start --}}
                    <div class="modal fade" id="exampleModal{{$color->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width:80%; vertical-align: top;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Color</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{ route('ColorsUpdate') }}" method="POST">
                                <input type="hidden" name="color_id" value="{{ $color->id }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="color">Name</label>
                                        <input type="text" name="color_name" class="form-control" id="color" placeholder="Color name" value="{{ $color->color_name }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    {{-- Color Edit Modal End --}}
                @empty
                <tr>
                    <td>No data Available</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            {{ $colors->links() }}
        </div>
        </div>
</div>

{{-- Color Add Modal Start --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:80%; vertical-align: top;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Color</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('AddPost') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="color">Name</label>
                    <input type="text" name="color_name" class="form-control" id="color" placeholder="Color name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- Color Add Modal End --}}



@endsection
