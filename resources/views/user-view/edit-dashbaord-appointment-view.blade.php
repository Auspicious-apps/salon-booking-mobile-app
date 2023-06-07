@extends('layout-user.app')

@section('content')

	
		<div class="content-wrapper">

				<div class="edit-appointment-block appointment-block-form">
						<h2 class="appointment_heading">Edit Appointment dashboard through backend:</h2>

						<form method="post"  name="post_edit_appointment_form" action="{{ url('post-edit-appointment-form') }}">
							@csrf
						<input type="hidden" name="edit_appointment_id" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->id }} @else echo '' @endif">
						<div class="coll">	
							<label>Nombre</label>
							<input type="text" name="first_name" class="first_name" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->first_name }} @else echo '' @endif">
							@error('title')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label>Apellidos </label>
							<input type="text" name="last_name" class="last_name" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->last_name }} @else echo '' @endif">
							@error('last_name')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label> Select Appointment Date</label>

							<input type="date" name="appointment_date"  id="edit-dashboard-appointment" value="{{ \Carbon\Carbon::createFromDate($editApointmentUserDetails->date)->format('Y-m-d')}}" />
							@error('appointment_date')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<label class="label-booking-time" style="display: none">Please select the time:</label>

						<div class="coll">	
							<div class="appointment-time">

										<?php 

									if(!empty($time_slot_data)) {
									for($i=0;$i<count($time_slot_data);$i++) { 
                                           
											$current_date = date('Y-m-d');

											if(strtotime($db_date) < strtotime($current_date))  {

											if($time_slot_data[$i]["start_time"]!=$selected_date &&$time_slot_data[$i]["is_booked"]!='1' ){?>

													<button type="button" class="btn btn-info selected-appointment-timing dash-apt-timing " value= " <?php echo  $time_slot_data[$i]["start_time"];  ?>" ><?php echo  $time_slot_data[$i]["start_time"];  ?>
                                                         </button>
                                          <?php } else { ?>

										<button type="button" class="btn btn-danger selected-appointment-timing dash-apt-timing " value= " <?php echo  $time_slot_data[$i]["start_time"];  ?>" disabled><?php echo  $time_slot_data[$i]["start_time"];  ?>
                                          </button>

										<?php  } ?>
									<?php } else { ?>

										<button type="button" class="btn btn-danger selected-appointment-timing dash-apt-timing " value= " <?php echo  $time_slot_data[$i]["start_time"];  ?>" disabled><?php echo  $time_slot_data[$i]["start_time"];  ?>
                                          </button>

									<?php  } } } ?>
 								
									
							</div>
						</div>

						<div class="coll" id="outer-div-selected-time">	
								<input type="hidden" name="hidden_selected_appointment_time" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->start_time }} @else echo  @endif" id="hidden_selected_appointment_time">                
								<span id="selected-time">The appointment time is:<input type="text" name="selected_apppointment_time" id="selected-apppointment-time" value="@if($editApointmentUserDetails){{ $editApointmentUserDetails->start_time}} @else echo  @endif" disabled></span>

						</div>
							
						<div class="coll">	
							<label>Coste   </label>
							<input type="text" name="total_cost" class="total_cost" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->total_cost }} @else echo '' @endif">
							@error('total_cost')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label>Correo Electrónico  </label>
							<input type="text" name="email" class="email" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->email }} @else echo '' @endif">
							@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	

						<div class="coll">	
							<label>Numero de télefono   </label>
							<input type="text" name="phone" class="phone" value="@if($editApointmentUserDetails) {{ $editApointmentUserDetails->phone }} @else echo '' @endif">
							@error('phone')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	
						<div class="coll">	

						<input type="submit" name="submit" class="submit" value="Update">
					</div>
						</form>

				</div>

		</div>
		<!-- <style>
.appointment-time font {
    width: 13%;
    display: flex;
flex-wrap: wrap;
grid-gap: 10px;
}
.appointment-time font font, .appointment-time font input {
    width: 100% !important;
} 
.a
@media(max-width: 749px){
	.appointment-time font {
    width: 23%;
}
} 
@media(max-width: 480px){
	.appointment-time font {
    width: 48%;
}
}
		</style> -->
@endsection