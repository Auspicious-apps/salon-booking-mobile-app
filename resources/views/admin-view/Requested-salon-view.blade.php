@extends('layout-admin.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
            
  <div class="content-wrapper">
   	

				 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Salon Registered Details</h3>
          

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.Nro.</th>
                    <th>Nombre</th>
                    <th>Apellidos </th>
                    <th>Nombre del salón</th>
                    <th>Correo Electrónico</th>
                    <th>Numero de télefono </th>
                    <th> Referred by other salon </th>
                    <th>Status</th>
                    <th>Tratamiento</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter=1; ?>
                     @if(!empty($getSaloon_Data))

                    @foreach($getSaloon_Data as $data)
                     
                     @if($data->saloon_status==0)
                     
                    
                  <tr>
                    <td><?php echo $counter;?> </td>
                    <td>{{ $data->first_name }}</td>
                    <td> {{ $data->last_name }} </td>
                    <td> {{ $data->saloon_name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->refered_by }}</td>
                    <td>@if($data->saloon_status ==0)
                        <span class="badge badge-pill badge-secondary">Pending</span>
                    @elseif($data->saloon_status ==1)
                        <span class="badge badge-pill badge-success">Approved</span>
                    @else
                        <span class="badge badge-pill badge-danger">Rejected</span>
                    @endif
                    </td>
                <td> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-{{ $data->id }}">
                    Approved / Rejected Status
                </button></td>
                
                      <div class="modal fade" id="modal-default-{{ $data->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Salon Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-text-block">
                                <p class="bold">Salon name</p>
                                <p>{{ $data->saloon_name }}</p>
                                </div>
                                   <div class="modal-text-block">
                                <p class="bold"> First Name </p>
                                <p>{{ $data->first_name }}</p>
                                </div>
                                   <div class="modal-text-block">
                                <p class="bold"> Last Name </p>
                                <p>{{ $data->last_name }}</p>
                                </div>
                                   <div class="modal-text-block">
                                <p class="bold"> Email </p>
                                <p>{{ $data->email }}</p>
                                </div>
                                   <div class="modal-text-block">
                                <p class="bold">Phone number</p>
                                <p>{{ $data->phone }}</p>
                                </div>
                                <div class="modal-text-block">
                                <p class="bold"> Referred by other salon </p>
                                <p> {{ $data->refered_by }} </p>
                                </div>
                                <div class="modal-text-block">
                                <p class="bold">Password</p><input type="password" name="generate_saloon_password" id="generate_saloon_password-{{ $data->id }}">
                                    </div>
                              <div class="modal-text-block">
                               <p class="bold">Confirm Password</p><input type="password" name="generate_confirm_password" id="generate_confirm_password-{{ $data->id }}">
                            </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary approved-saloon" accepted-saloon-id="{{ $data->id }}"  check-saloon ="isapproved">Approved</button>
                              <button type="button" class="btn btn-primary rejected-saloon" rejected-saloon-id="{{ $data->id}}"   check-saloon="isrejected" >Rejected</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      
                  </tr>
                  
                  <?php $counter++; ?>
                  @endif
                  @endforeach
                  @endif
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.Nro.</th>
                    <th>Nombre</th>
                    <th>Apellidos </th>
                    <th>Nombre del salón</th>
                    <th>Correo Electrónico</th>
                    <th>Numero de télefono </th>
                    <th> Referred by other salon </th>
                    <th>Status</th>
                    <th>Tratamiento</th>
                  </tr>
                  </tfoot>
                </table>
              
              </div>
              <!-- /.card-body -->
            </div>
       

  </div>
      
    
  
@endsection
