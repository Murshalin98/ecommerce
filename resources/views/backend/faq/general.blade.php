@extends('backend.master')

@section('faq')
    active
@endsection

@section('content')

<div class="sl-pagebody">

    <div class="sl-page-title">
        <div class="row">
            <div class="col-12 justify-content-between d-flex">
                <h5>General FAQ</h5>
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

        @if (session('update'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-info-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done! </strong>{{ session('update') }}</span>
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
                    <th>SL</th>
                    <th>Question</th>
                    <th>Answear</th>
                    <th>Since</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($details as $key => $detail)
                  <tr>
                    <td>{{ $details->firstItem() + $key }}</td>
                    <td>{{ $detail->question }}</td>
                    <td>{{ $detail->answear }}</td>
                    <td>{{ $detail->created_at->diffforhumans() }}</td>
                    <td class="text-center"><a data-toggle="modal" data-target="#modaldemo3{{$detail->id}}" class="btn btn-outline-info">Edit</a></td>
                    <td class="text-center"><a href="{{ route('GenarelFaqDelete', $detail->id) }}" class="btn btn-outline-danger">Delete</a></td>
                  </tr>
                    {{-- Edit FAQ Modal Start --}}
                    <div id="modaldemo3{{$detail->id}}" class="modal fade" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content tx-size-sm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update FAQ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('GenarelFaqUpdate', $detail->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="faq_id" value="{{$detail->id}}">
                                <div class="modal-body pd-20">
                                    <p class="mg-b-5">Update general FAQ question and answers for your Client about Products & Delivery. </p>
                                    <div class="form-group pt-4">
                                        <label for="question"><b>Question</b></label>
                                        <input type="text" name="question" class="form-control" id="question" placeholder="FAQ Question" value="{{ $detail->question }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="answear"><b>Answear</b></label>
                                        <textarea type="text" name="answear" class="form-control" id="answear" placeholder="Genarel Answear ..." rows="10">{{ $detail->answear }}</textarea>
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
                    {{-- Edit FAQ Modal End --}}
                  @empty

                  @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>

{{-- Add FAQ Modal Start --}}
<div id="modaldemo3" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('GenarelFaqPost') }}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <p class="mg-b-5">Add general FAQ question and answers for your Client about Products & Delivery. </p>
                <div class="form-group pt-4">
                    <label for="question"><b>Question</b></label>
                    <input type="text" name="question" class="form-control" id="question" placeholder="FAQ Question">
                </div>
                <div class="form-group">
                    <label for="answear"><b>Answear</b></label>
                    <textarea type="text" name="answear" class="form-control" id="answear" placeholder="Genarel Answear ..." rows="10"></textarea>
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
{{-- Add FAQ Modal End --}}

@endsection
