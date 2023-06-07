@extends('layout-user.app')

@section('content')


<div class="content-wrapper">
    
    <div class="service-block">
      <div class="service-heading content-header">
         <h1 class="m-0">Staff Services List
</h1>
      </div> 
    </div>
    
    <div class="service-main-block">
        
        
        <ul class="service-list">
            
            @foreach ($get_staff_services_data as $staff_service)
             
                <li class="service-list-item">
                            
                    <div class="service-title heading">{{ $staff_service->title }}</div>
                        <div class="service-icons">
                        <a href="" class="service-edit edit" id="editstaffService" data-toggle="modal" data-target='#service-add-modal' data-id="{{$staff_service->id }}"><i class="fas fa-edit"></i></a>                        
                        <a href="" class="service-delete delete"  id="deletestaffService" data-id="{{$staff_service->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>                    
                    </div>
                </li>
             
            @endforeach
            
            <li class="service-list-item add-btn create-box"> Add </li>
            
        </ul>
        
    </div>
    
    
    <div class="modal" id="service-add-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Service Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="service_add_form" method="post" action="{{ action('User\StaffServiceController@insert_service') }}">

                      @csrf

                      <input type="hidden" id="service_id" name="service_id" value="">


                     
                        <div class="row">
                          <div class="col-sm-12">
                            <label for="title">  Title:   </label>
							    <input type="text" name="title" class="form-control" id="service-title" value="" placeholder="Enter the title">
                          </div>

                        </div>
                        
                    

                       <button type="submit" class="btn btn-primary" id="add-service">Submit</button>

                       <span class="btn btn-primary" id="edit-service" style="display:none">Edit Service</span>

                    </form>
                  </div>
                </div>
              </div>
            </div>
    
    </div>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <script>

              $(document).ready(function(){


                $.ajaxSetup({
                  headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                });


                $('body').on('click', '.add-btn', function (event) {

                    
                    $('#service-title').val('');
                    
                    $('#service-add-modal').modal('show');
                    

                });


                $('body').on('click', '#editstaffService', function (event) {

                  event.preventDefault();
                  var id = $(this).data('id');
                  console.log(id)
                  $.get('service-edit/' + id, function (data) {
                      $('#add-service').hide();
                      $('#edit-service').show();
                      $('#practice_modal').modal('show');
                      $('#service_id').val(data.data.id);
                      $('#service-title').val(data.data.title);
                    });

                });

                
                $('body').on('click', '#edit-service', function (event) {

                  event.preventDefault()
                  var id = $("#service_id").val();
                  var title = $('#service-title').val();
                 
                  $.ajax({
                    url: 'service-update/' + id,
                    type: "GET",
                    data: {
                      id: id,
                      title: title,
                    },

                    dataType: 'json',
                    success: function (data) {
                      $('#practice_modal').modal('hide');
                      $('#service_add_form').trigger("reset");
                        
                      window.location.reload(true);
                    }
                  });
                });


                $('body').on('click', '#deletestaffService', function (event) {

                     var id = $(this).attr('data-id');

                      event.preventDefault()
                   

                               swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })

                  .then((willDelete) => {
                    if (willDelete) {
                      
                        $.ajax({
                            url: 'service-delete/' + id,
                            type: "GET",
                            dataType: 'json',
                            success: function (data) {
                              window.location.reload(true);
                          }
                      });

                    }
                  });


                });
              });

            </script>   
    
    
    
@endsection