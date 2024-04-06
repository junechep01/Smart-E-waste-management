@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
            <div class="card">
                <div class="pb-0 p-3">
                    <div class="card-header pb-0">
                        <h6>Contact Us Emails</h6>
                      
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        <table class="table table-striped align-items-center mb-0" id="dt-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase ">Name</th>
                                            <th class="text-uppercase ">Email </th>
                                            <th class="text-uppercase ">Phone Number</th>
                                            <th class="text-uppercase ">Message</th>
                                            <th class="text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($emails as $email)
                                            <tr>
                                                <td>
                                                    <p>{{$email->name}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$email->email}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$email->phone_number?? 'Null'}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$email->message}}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                   
                                                    <a class="btn btn-danger btn-xs font-weight-bold   mb-0 delete" data-id="{{$email->id}}">
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
            <!-- Create course Modal -->
            <div class="modal fade" id="createagency" tabindex="-1" role="dialog" aria-labelledby="createHeroSlide" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Add Course</h3>
                                    <p class="mb-0">Fill in the information below to add a new course</p>
                                </div>
                                <div class="card-body pb-3">
                                    <form role="form text-left" method="post" action=" route('course.store')" enctype="multipart/form-data">
                                        @csrf
                                        <label>Title</label>
                                        <div class="input-group mb-3">
                                            <input name="title" required type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="title-addon">
                                        </div>
                                        <label>Description</label>
                                        <div class="input-group mb-3">
                                            <textarea name="description" required type="text" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="description-addon" rows="5"></textarea>
                                        </div>
                                        <label>Course Image</label>
                                        <div class="input-group mb-3">
                                            <input name="image" required class="form-control" placeholder="Image" aria-label="Image" aria-describedby="image-addon" type="file" accept="image/jpeg, image/png, image/jpg">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Add Course</button>
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
            <!-- Delete Slide Modal -->
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
