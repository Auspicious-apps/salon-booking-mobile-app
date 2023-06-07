@extends('layout-user.app')

@section('content')
<?php
	use App\User;
?>
	<div class="content-wrapper">
 <!-- /.card -->

            @if (session('edit_status_appointment'))
              <div class="alert alert-success">
                  {{ session('edit_status_appointment') }}
              </div>
            @endif

               @if (session('edit_app_status_appointment'))
              <div class="alert alert-success">
                  {{ session('edit_app_status_appointment') }}
              </div>
            @endif

            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Tablero de citas rechazadas a través del backend: </h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              		
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr class="rejection-top-headings">
                    <th class="th-sm">Sr.Nro.


                    </th>
                    <th class="th-sm">Nombre

                    </th>
                    <th class="th-sm">Apellidos 

                    </th>
                    <th class="th-sm">Día de la cita 

                    </th>
                    <th class="th-sm">Hora de la cita

                    </th>
                
                       <th class="th-sm">Coste

                    </th>
                      <th class="th-sm">Correo Electrónico

                    </th>
                     <th class="th-sm">Numero de télefono 

                    </th>
                     <th class="th-sm">status

                    </th>
                 
                  </tr>
                </thead>
                <tbody>
                 @if(!empty($getApointmentUserDetails))
              					@php
              						$counter = 1;
              					@endphp
                                	  @foreach($getApointmentUserDetails as $data)
                                	  	@if(!empty($data->first_name))
                                 <tr class="rejection-top-headings">
                                	
                                	<td>{{ $counter }}</td> 
                                  <td>{{ $data->first_name }}
                                  </td>
                                  <td>{{ $data->last_name }}
                                  </td>
                                   <td>{{ $data->date }}
                                  </td>
                                   <td>{{ $data->start_time }}
                                  </td>
                                   <td>{{ $data->total_cost }}
                                  </td>
                                   <td>{{ $data->email }}
                                  </td>
                                  <td>{{ $data->phone }}
                                  </td>
                                  <td><span class="badge badge-danger">Rejected</span>
                                  </td>
              					
                                  	
                                </tr>
                                @php
              						$counter++;
              					@endphp
              				@endif
                                @endforeach
                              	@endif
               
                </tbody>
                <tfoot>
                   <tr class="rejection-top-headings">
              		<th>Sr.Nro.</th>
              		<th>Nombre</th>
              		<th>Apellidos</th>
              		<th>Día de la cita </th>
              		<th>Hora de la cita</th>
              		<th>Coste</th>
              		<th>Correo Electrónico</th>
              		<th>Numero de télefono</th>
                    <th>status

                    </th>
             
                  </tr>
                </tfoot>
              </table>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->



    <!-- /. second card -->

    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tablero de citas rechazadas a través de la aplicación:</h3>
            </div>
      	<!-- /.card-header -->
      	<div class="card-body">
              		
    <table id="dtBasicExample_test" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
    <tr class="rejection-top-headings">
      <th class="th-sm">Sr.No.

      </th>
      <th class="th-sm">First Name

      </th>
      <th class="th-sm">Last Name

      </th>
      <th class="th-sm">Appointment Date

      </th>
      <th class="th-sm">Appointment  Time

      </th>
  
         <th class="th-sm">Total cost

      </th>
        <th class="th-sm">Email

      </th>
       <th class="th-sm">Phone

      </th>
        <th class="th-sm">Status

      </th>

    </tr>
  </thead>
  <tbody>
   		@if(!empty($getApointmentUserDetails))
			@php
				$counter = 1;
			@endphp
            @foreach($getApointmentUserDetails as $getData_User)
            				
            @if(empty($getData_User->first_name))		
            	<?php if(!empty($getData_User->customer_id)) {	
					
						$customer_id  =  $getData_User->customer_id;	
						$getData_user = \App\User::where('id',$customer_id)->first();

						  if(!empty($getData_user->user_type==3)) {
            		 ?>
                 <tr class="rejection-top-headings">
                  	
                  	<td>{{ $counter }}</td> 
                    <td>{{ $getData_user->first_name }}
                    </td>
                    <td>{{ $getData_user->last_name }}
                    </td>
                     <td>{{ $getData_User->date }}
                    </td>
                     <td>{{ $getData_User->start_time }}
                    </td>
                     <td>{{ $getData_User->total_cost }}
                    </td>
                     <td>{{ $getData_User->email }}
                    </td>
                    <td>{{ $getData_User->phone }}
                    </td>
                      <td><span class="badge badge-danger">Rejected</span>
                    </td>
                    	
                </tr>
            <?php }
            	}
             ?>
                    @php
						$counter++;
					@endphp
				@endif
            @endforeach
            @endif
 
	  	</tbody>
	  	<tfoot>
	    <tr class="rejection-top-headings">
			<th>Sr.No.</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Appointment Date</th>
			<th>Appointment Time</th>
			<th>Total cost</th>
			<th>Email</th>
			<th>Phone</th>
      <th>Status

      </th>
	
	    </tr>
	  	</tfoot>
	</table>

    </div>
              <!-- /.card-body -->
</div>
            <!-- /.card -->

</div>


 


@endsection