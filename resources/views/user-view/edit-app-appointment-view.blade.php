@extends('layout-user.app')

@section('content')

	
		
		<div class="content-wrapper">

				<div class="edit-appointment-block appointment-block-form">

						<h2 class="appointment_heading">Edit Appointments dashboard through app:</h2>
						<form method="post" name="post_edit_appointment_form" action="{{ url('post-edit-app-appointment-form') }}">
							@csrf
						<input type="hidden" name="edit_userDetails_id" value="@if($edit_app_UserDetails) {{ $edit_app_UserDetails->id }} @else  @endif">

						<input type="hidden" name="edit_appointment_id" value="@if($edit_appointment_details) {{ $edit_appointment_details->id }} @else  @endif">

						<div class="coll">	
							<label>First Name</label>
							<input type="text" name="first_name" class="first_name" value="@if($edit_app_UserDetails) {{ $edit_app_UserDetails->first_name }} @else  @endif">
							@error('title')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label>Last Name</label>
							<input type="text" name="last_name" class="last_name" value="@if($edit_app_UserDetails) {{ $edit_app_UserDetails->last_name }} @else  @endif">
							@error('last_name')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label>Select Appointment Date</label>

							<input type="date" name="app_appointment_date" id="app_appointment_date" value="{{ \Carbon\Carbon::createFromDate($edit_appointment_details->date)->format('Y-m-d')}}" />
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
								<input type="hidden" name="hidden_selected_appointment_time" value="@if($edit_appointment_details) {{ $edit_appointment_details->start_time }} @else echo  @endif" id="hidden_selected_appointment_time">                
								<span id="selected-time">The appointment time is:<input type="text" name="selected_apppointment_time" id="selected-apppointment-time" value="@if($edit_appointment_details){{ $edit_appointment_details->start_time}} @else echo  @endif" disabled></span>

						</div>

						<div class="coll">	
							<label>Total Cost </label>
							<input type="text" name="total_cost" class="total_cost" value="@if($edit_appointment_details) {{ $edit_appointment_details->total_cost }} @else  @endif">
							@error('total_cost')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="coll">	
							<label>Email  </label>
							<input type="text" name="email" class="email" value="@if($edit_appointment_details) {{ $edit_appointment_details->email }} @else  @endif">
							@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>	

						<div class="coll">	
							<label>Phone  </label>
							<input type="text" name="phone" class="phone" value="@if($edit_appointment_details) {{ $edit_appointment_details->phone }} @else  @endif">
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
@endsection