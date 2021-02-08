@extends('backend.master')
@section('breadcrumb')
    Create Blog
@endsection

@section('blog')
    active
@endsection

@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Create Blog</h5>
    </div>

    <div class="card pd-20">

        @if(session('insert'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Well done! </strong>{{ session('insert') }}. Check <a href="{{ route('ProductsList') }}"><b>Products List</b></a></span>
                </div>
            </div>
        @endif

        <div class="col-md-12">
            <form action="{{route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Blog title" value="{{ old('title') }}">
                          @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group col-6">
                          <label for="blog_category">Blog Category</label>
                          <select class="form-control @error('blog_category') is-invalid @enderror" name="blog_category">
                            <option value="">Choose...</option>
                            @foreach ($blogCategory as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                          @error('blog_category')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="images">Featured Images</label>
                        <input multiple type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group pb-2">
                    <label for="body">Details</label>
                    <textarea type="text" name="body" class="form-control my-editor @error('body') is-invalid @enderror" id="body" placeholder="Blog Details" rows="4"></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary">Create</button>
              </form>
        </div>
    </div>
</div>
@endsection

@section('footer_js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
          path_absolute : "/",
          selector: "textarea.my-editor",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };

        tinymce.init(editor_config);
      </script>
@endsection
