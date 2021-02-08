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

      <h6 class="card-body-title">Total Products ({{ $countP }})</h6>

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

      <div class="table-responsive">
        <table class="table table-bordered mg-b-0 mb-3 mt-2">
          <thead>
            <tr>
              <th>SL</th>
              <th>Title</th>
              <th>Price</th>
              <th>Category</th>
              <th>Sub Cats</th>
              <th>Slug</th>
              <th class="text-center">Quantity</th>
              <th>Summary</th>
              <th>Description</th>
              <th>Thumbnail</th>
              <th>Images</th>
              <th>Create</th>
              <th>Update</th>
              <th class="text-center">Edit</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($products as $key => $product)
            <tr>
                <th>{{ $products->firstItem() + $key }}</th>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->get_category->category_name }}</td>
                <td>{{ $product->get_subcategory->subcategory_name }}</td>
                <td>{{ $product->slug }}</td>
                <td class="text-center">
                    @php $d = 0; @endphp
                    @foreach (App\Models\Products_Attribute::where('product_id', $product->id)->get() as $item)
                        @php $d += $item->quantity @endphp
                    @endforeach

                    @if ($d > 0 && $d <= 10)
                        <span class="text-danger">{{$d}} Stock in Low</span>
                    @elseif ($d <= 10)
                        <span class="text-danger">{{$d}} StockOut</span>
                    @else
                        <span class="text-info">{{$d}}</span>
                    @endif
                </td>
                <td>{{ $product->summary }}</td>
                <td>{{ $product->description }}</td>
                <td><img width="100" src="{{ asset('products/thumbnail/'. $product->thumbnail) }}" alt="{{ $product->title }}"></td>
                <td>
                    @foreach ($product->product_images as $images)
                        <img width="100" src="{{ asset('products/images/'. $product->id .'/'. $images->images) }}" alt="{{ $product->title }}">
                        <div class="text-right pb-2"><a href="{{ route('SinglePictureDeletePro', $images->id) }}"><i class="fa fa-times"></i></a></div>
                    @endforeach
                </td>
                <td>{{ $product->created_at->diffForHumans() }}</td>
                <td>{{ $product->updated_at !=null ? $product->updated_at->diffForHumans() : 'N/A' }}</td>
                <td class="text-center"><a href="{{ route('ProductsEdit', $product->id) }}" class="btn btn-outline-info">Edit</a></td>
                <td class="text-center"><a href="{{ url('products/delete/'. $product->id) }}" class="btn btn-outline-danger">Delete</a></td>
            </tr>
            @empty
            <tr>
                <td>None</td>
                <td>No Available Product</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        {{ $products->links() }}
      </div>
    </div>
</div>
@endsection
