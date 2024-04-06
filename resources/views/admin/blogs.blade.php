@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
            <div class="card">
                <div class="pb-0 p-3">
                    <div class="card-header pb-0">
                        <h6>Blogs</h6>
                        <div class="d-flex justify-content-end">
                           <a type="button" class="btn btn-info" href="{{route('blogs.create')}}">
                                Add Blog
                            </a>                     
                        </div>
                      
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        <table class="table table-striped align-items-center mb-0" id="dt-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase ">Title</th>
                                            <th class="text-uppercase ">Body </th>                                            
                                            <th class="text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs  as $blog)
                                            <tr>
                                                <td>
                                                    <p>{{$blog->title}}</p>
                                                </td>
                                                <td>
                                                    <p >{!!substr($blog->body, 0, 50) !!}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                   
                                                    <a class="btn btn-danger btn-xs font-weight-bold   mb-0 delete" data-id="{{$blog->id}}">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                           
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="modal fade" id="deleteCourse" tabindex="-1" role="dialog" aria-labelledby="deleteHeroSlide" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Deleting...</h4>
                            <span class="close" style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </span>
                        </div>
                        <form class="form-horizontal" method="POST" action="/courseDelete">
                            @csrf
                            @method("DELETE")
                            <div class="modal-body">
                                <input type="hidden" class="sid" name="id">
                                <div class="text-center">
                                    <h2 class="bold catname"></h2>
                                    <p>
                                        Are you sure you want to delete this Course?
                                        <br>
                                        <span class="text-danger">This action cannot be reversed!</span>
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between pb-0">
                            <button type="button" class="btn btn-sm btn-secondary btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                                <button type="submit" class="btn btn-sm btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Delete Slide Modal -->
             
        
      </div>
@endsection

@push('js')
@endpush

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.js" integrity="sha512-NMtENEqUQ8zHZWjwLg6/1FmcTWwRS2T5f487CCbQB3pQwouZfbrQfylryimT3XvQnpE7ctEKoZgQOAkWkCW/vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
            $(function(){
            $(document).on('click', '.delete', function(e){
                e.preventDefault();
                $('#deleteCourse').modal('show');
                var id = $(this).data('id');
                getRow2(id);
            });    
        });
        function getRow2(id){
            $.ajax({
                type: 'GET',
                url: '{{URL::to('courseRow')}}',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $('.sid').val(response.id);
                    $('#edit_type').val(response.title);
                    $('#edit_description').val(response.description);
                    $('.catname').html(response.title);
                }
            });
        }
    </script>
@endsection
