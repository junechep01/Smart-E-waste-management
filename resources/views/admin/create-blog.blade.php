@extends('admin.app')
@section('content')

      <!-- Include CKEditor from CDN -->
      <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <div class="container-fluid py-4">
            <div class="card">
                <div class="pb-0 p-3">
                    <div class="card-header pb-0">
                   
                        <div class="">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Add Blog</h3>
                                    <p class="mb-0">Fill in the information below to add a new course</p>
                                </div>
                                <div class="card-body pb-3">
                                    <form role="form text-left" method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <label>Title</label>
                                        <div class="input-group mb-3">
                                            <input name="title" required type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="title-addon">
                                        </div>
                                        <label>Body</label>
                                        <div class="input-group mb-3">
                                            <textarea name="body" id="editor" required class="form-control" placeholder="Description" aria-label="Description" aria-describedby="description-addon" rows="5"></textarea>
                                        </div>
                                        <label>Display Image</label>
                                        <div class="input-group mb-3">
                                            <input name="image" required class="form-control" placeholder="Image" aria-label="Image" aria-describedby="image-addon" type="file" accept="image/jpeg, image/png, image/jpg">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded  mt-4 mb-0">Add Blog</button>
                                        </div>
                                    </form>
                                </div>


                                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                    <p class="mb-4 mx-auto"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    </div>
                    
                </div>
            </div>
          
        
         
             
        
      </div>

<script>
    CKEDITOR.replace('editor', {
    width: '100%',
});
</script>


@endsection

