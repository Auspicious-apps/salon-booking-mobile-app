@extends('layout-admin.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   	

				 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Salon Approved Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.Nro.</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nombre del salón</th>
                    <th>Correo Electrónico</th>
                    <th>Numero de télefono</th>
                    <th> Referred by other salon </th>
                    <th>Status</th>
                    <th>Changed Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter=1; ?>

                    @if(!empty($getRejectedSaloon_Data))
                    @foreach($getRejectedSaloon_Data as $data)
                     
                     @if($data->saloon_status==2)
                     
                    
                  <tr>
                      <td><?php echo $counter;?> </td>
                    <td>{{ $data->first_name }}</td>
                    <td> {{ $data->last_name }} </td>
                    <td> {{ $data->saloon_name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td> {{ $data->refered_by }}</td>
                    <td>@if($data->saloon_status ==0)
                        <span class="badge badge-pill badge-secondary">Pending</span>
                    @elseif($data->saloon_status ==1)
                        <span class="badge badge-pill badge-success">Approved</span>
                    @else
                        <span class="badge badge-pill badge-danger">Rejected</span>
                    @endif
                    </td>

                    <td> <button type="button" class="btn btn-warning changed_request_rejectedStatus" id="changed_request_rejectedStatus-{{ $data->id }}" changed-rejected-status = "{{ $data->id }}">click to Approved status</button></td>
                  
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
                    <th>Numero de télefono</th>
                    <th> Referred by other salon </th>
                    <th>Status</th>
                    <th>Changed Status</th>
                
                  </tr>
                  </tfoot>
                </table>
              
              </div>
              <!-- /.card-body -->
            </div>
       

  </div>
      
    
  
@endsection
