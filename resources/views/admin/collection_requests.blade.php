@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
            <div class="card">
                <div class="pb-0 p-3">
                    <div class="card-header pb-0">
                        <h6>Users</h6>
                      
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        <table class="table table-striped align-items-center mb-0" id="dt-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase ">Client</th>
                                            <th class="text-uppercase ">Status </th>
                                            <th class="text-uppercase ">Message</th>
                                            <th class="text-uppercase ">Address</th>
                                            <th class="text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($collection_requests as $request)
                                            <tr>
                                                <td>
                                                    <p>{{$request->user->name}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$request->status}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$request->message}}</p>
                                                </td>
                                                <td>
                                                    <p >{{$request->user->address}}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                   
                                                    <!-- <a class="btn btn-danger btn-xs font-weight-bold   mb-0 delete" data-id="{{$request->id}}">
                                                        Delete
                                                    </a> -->
                                                    <a class="btn btn-info btn-xs font-weight-bold text-xs mb-0 edit" data-address="{{$request->user->address}}" data-id="{{$request->id}}" data-name="{{$request->user->name}}" >
                                                        Update
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
                                    <h3 class="font-weight-bolder text-info text-gradient">Update Request</h3>
                                    <p class="mb-0">Fill in the information below to update request</p>
                                </div>
                                <div class="card-body pb-3">
                                <form role="form" method="post" action="{{ route('request.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Use the correct HTTP method for updates -->

                                    <input type="hidden" name="id">

                                    <div class="form-group">
                                        <label for="name">Client Name</label>
                                        <input name="name" required type="text" class="form-control" placeholder="Client Name" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input name="address" required type="text" class="form-control" placeholder="Address" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="approval_status">
                                            <option value="Approved">Approved</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="points">Points Awarded</label>
                                        <input name="points" type="number" class="form-control" placeholder="Points">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Update Request</button>
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
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var address = $(this).data('address');
            console.log(name, address, id)
            $('#createagency').find('input[name="name"]').val(name);
            $('#createagency').find('input[name="address"]').val(address);
            $('#createagency').find('input[name="id"]').val(id);
            $('#createagency').modal('show');
        });
    </script>
@endsection
