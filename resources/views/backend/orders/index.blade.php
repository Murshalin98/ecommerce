@extends('backend.master')

@section('orders')
    active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Orders List</h5>
        <a href="{{route('exportExcel')}}" class="btn btn-info" style="float: right">Excel Download</a>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">
      <h6 class="card-body-title">All Orders (count)</h6>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($orders as $key => $order)
          <tr>
            <th scope="row">{{$orders->firstItem()+$key}}</th>
            <td>{{$order->product->title}}</td>
            <td>{{$order->quantity}}</td>
            <td>$ {{$order->product_unit_price}}</td>
            <td>{{$order->created_at->format('d-m-Y') }}</td>
          </tr>
          @empty
            <tr>
                <td colspan="10" class="text-center"> No data Available </td>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $orders->links() }}
    </div>
</div>
@endsection
