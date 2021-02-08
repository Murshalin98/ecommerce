@extends('backend.master')
@section('breadcrumb')
    Products Update
@endsection

@section('products')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Update Product</h5>
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">

        @if(session('update'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done! </strong>{{ session('update') }}. Check <a href="{{ route('ProductsList') }}"><b>Products List</b></a></span>
                </div>
            </div>
        @endif

        <div class="col-md-12">
            <form action="{{ route('ProductsUpdate') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="{{ $products->id }}" name="pro_id">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Product Name" value="{{ $products->title ?? old('title') }}">
                          @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group col-6">
                          <label for="price">Price</label>
                          <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Product Price" value="{{ $products->price ?? old('price') }}">
                          @error('price')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                          <option value="">Select</option>
                          @foreach ($category as $cat)
                            <option @if($products->category_id == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="subcategory_id">Sub Category</label>
                        <select class="form-control @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id">
                          <option value="">Select</option>
                          @foreach ($subcategory as $scat)
                            <option @if($products->subcategory_id == $scat->id) selected @endif value="{{ $scat->id }}">{{ $scat->subcategory_name }}</option>
                          @endforeach
                        </select>
                        @error('subcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="summary">Summary</label>
                        <textarea type="text" name="summary" class="form-control @error('summary') is-invalid @enderror" id="summary" placeholder="Product Summary" rows="3" value="{{ old('summary') }}">{{ $products->summary }}</textarea>
                        @error('summary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img width="50" src="{{ asset('products/thumbnail/'. $products->thumbnail) }}" alt="{{ $products->title }}" class="pt-2">
                    </div>
                    <div class="form-group col-3">
                        <label for="images">Images</label>
                        <input multiple type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @foreach ($products->product_images as $images)
                            <img width="50" src="{{ asset('products/images/'. $products->id .'/'. $images->images) }}" class="pt-2">
                        @endforeach
                    </div>
                </div>

                <div class="field_wrapper">
                    @foreach ($products->products_attributes as $attributes)
                    <input name="attribute_id[]" value="{{ $attributes->id }}" type="hidden">
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="color_id">Color</label>
                            <select class="form-control @error('color_id') is-invalid @enderror" id="color_id" name="color_id[]">
                              <option value="">Select</option>
                              @foreach ($colors as $color)
                                <option @if($attributes->color_id == $color->id) selected @endif value="{{ $color->id }}">{{ $color->color_name }}</option>
                              @endforeach
                            </select>
                            @error('color_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="quantity">Quantity</label>
                        <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Ex: 10" value="{{ $attributes->quantity }}" disabled>
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="size">Size</label>
                            <select name="size_id[]" class="form-control" id="size">
                                <option @if($attributes->size_id == 1) selected @endif value="1">M</option>
                                <option @if($attributes->size_id == 2) selected @endif value="2">L</option>
                                <option @if($attributes->size_id == 3) selected @endif value="3">XL</option>
                                <option @if($attributes->size_id == 4) selected @endif value="4">XXL</option>
                                <option @if($attributes->size_id == 5) selected @endif value="5">XXXL</option>
                            </select>
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="form-group pb-2">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Product Description" rows="4">{{ $products->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary">Add Product</button>
              </form>
        </div>
    </div>
</div>
@endsection

@section('footer_js')
<script type="text/javascript">
    $('#category_id').change(function(){
    var category_id = $(this).val();

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        if(category_id){
            $.ajax({
            type:"GET",
            url:"{{ url('sub-category/get-ajax-list/') }}/"+category_id,
            // data: [name:category_id]
            success:function(res){
                if(res){
                    $("#subcategory_id").empty();
                    $("#subcategory_id").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                    });

                }else{
                $("#subcategory_id").empty();
                }
            }
            });
        }
        else{
            $("#subcategory_id").empty();
        }
    });


    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row"><div class="form-group col-3"><label for="color_id">Color</label><select class="form-control @error('color_id') is-invalid @enderror" id="color_id" name="color_id[]"><option value="">Select</option>@foreach ($colors as $color)<option value="{{ $color->id }}">{{ $color->color_name }}</option>@endforeach</select>@error('color_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group col-3"><label for="quantity">Quantity</label><input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Ex: 10">@error('quantity')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group col-3"><label for="size">Size</label><select name="size_id[]" class="form-control" id="size"><option value="1">M</option><option value="2">L</option><option value="3">XL</option><option value="4">XXL</option><option value="5">XXXL</option></select>@error('quantity')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
@endsection
