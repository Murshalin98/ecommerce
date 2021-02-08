@extends('backend.master')

@section('details')
    active
@endsection

@section('content')

<div class="sl-pagebody">

    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>About Details</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo3"> Add </button>
            </div>
        </div>
    </div>

    <div class="card pd-10 pd-sm-20 mg-t-0">

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

        @if (session('limit'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Ops! </strong>{{ session('limit') }}</span>
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
            <span><strong>Ops! </strong>{{ session('delete') }}</span>
            </div>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($details as $detail)
                  <tr>
                    <td>{{ $detail->phone }}</td>
                    <td>{{ $detail->email }}</td>
                    <td>{{ $detail->about }}</td>
                    <td class="text-center"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modaldemo3{{$detail->id}}">Edit</button></td>
                    <td class="text-center"><a href="{{ route('AboutDetailsDelete', $detail->email) }}" class="btn btn-outline-danger">Delete</a></td>
                  </tr>
                    {{-- Edit Details Modal Start --}}
                    <div id="modaldemo3{{$detail->id}}" class="modal fade" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content tx-size-sm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add About</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('AboutDetailsUpdate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="about_id" value="{{ $detail->id }}">
                                <div class="modal-body pd-20">
                                    <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Contact number" value="{{ $detail->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail address" value="{{ $detail->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Street address" value="{{ $detail->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="about">About</label>
                                        <textarea type="text" name="about" class="form-control" id="about" placeholder="About Details" rows="4">{{ $detail->about }}</textarea>
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
                    {{-- Edit Details Modal End --}}
                  @empty
                    <tr>
                        <td>None</td>
                        <td>Data not Find</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>

{{-- Add Details Modal Start --}}
<div id="modaldemo3" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add About</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Contact number">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail address">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Street address">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea type="text" name="about" class="form-control" id="about" placeholder="About Details" rows="4"></textarea>
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
{{-- Add Details Modal End --}}

@endsection
