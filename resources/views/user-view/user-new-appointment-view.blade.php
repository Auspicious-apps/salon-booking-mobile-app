@extends('layout-user.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block agenda_-salon">
      <div class="staff-heading content-header new-appointment-block">
        @if (session('new_appointment_saved'))
          <div class="alert alert-success">
            {{ session('new_appointment_saved') }}
          </div>
        @endif

         <h1 class="m-0"> New Appointment </h1>
      </div> 
          </div>
            <form class="form-right-side book-service-form" action="{{ url('post-new-appointment') }}" method="post" onsubmit="return checkForm();" name="appointmentform">
        @csrf
          <div class="appointment-header">
          <div class="date-new-butn-flex">   

        <div class="date-timing-block grid-gap-date timing-flex">
            <!-- <input type="text" id="appointment_calender" name="newappointment_calender" placeholder="Select Dates" class="appointment_input__item" value="{{ old('newappointment_calender') }}"><img class="ui-datepicker-trigger" src="https://www.mi-salon.es/public/salon_images/calender.png" alt="..." title="..."> -->
            <!-- @if ($errors->has('newappointment_calender')) -->
                <!--   <span class="text-danger">{{ $errors->first('newappointment_calender') }}</span> -->
            <!--   @endif -->
            <!-- <button id="test">
                Submit
            </button> -->
           <!--  <input type="time" id="appointment_time" name="appointment_time" value="{{ old('appointment_time') }}"> -->
           <label class="date-select" style="display: block;">Please select your Date:</label>
           <input type="date" id="appointment_calender" name="appointment_calender">


        </div>




          </div>
            <div class="baokking-timing-block">                                                
           <label class="label-booking-time" style="display: none">Please select the time:</label>

           <div class="appointment-time">

          
          </div>

          <div id="outer-div-selected-time" style="display: none">


                <input type="hidden" name="hidden_selected_appointment_time" value="" id="hidden_selected_appointment_time">                
               <span id="selected-time">The appointment time is:<input type="text" name="selected_apppointment_time" id="selected-apppointment-time" value="" disabled></span>
                @if ($errors->has('hidden_selected_appointment_time'))
                  <span class="text-danger">Please select the appointment time</span>
              @endif


          </div>
        </div>

        <div class=" salon-timing-block salon-name">
          <div class="book-service-heading">
            <h3>Book your services</h3>
          </div>

          <div class="services-flex">
            <div class="book-service-form-list">
            <div class="coll">
              <input type="text" id="first name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
              @if ($errors->has('first_name'))
                  <span class="text-danger">{{ $errors->first('first_name') }}</span>
              @endif
            </div>
            <div class="coll">
              <input type="text" id="last name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
              @if ($errors->has('last_name'))
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
              @endif
            </div>
          </div>
           <div class="book-service-form-list">
             <div class="coll">
              <input type="text" id="contact_number"  name="contact_number" placeholder="Phone Number" value="{{ old('contact_number') }}">
              @if ($errors->has('contact_number'))
                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
              @endif
            </div>
                  <div class="coll">
           <input type="text" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
            @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>
        </div>
            
              <h4> Select Gender</h4>
              <div class="select-genger--grid new-select-flex">


              
              <select class="selectedGenerCategories" name="selectServiceCategories">
                <option value="">Select any option</option>
                <option value="men" @if (old('selectServiceCategories') == 'men') selected="selected" @endif>Men</option>
                <option value="women" @if (old('selectServiceCategories') == 'women') selected="selected" @endif>Women</option>
                <option value="child" @if (old('selectServiceCategories') == 'child') selected="selected" @endif>Child</option>
              </select>
               @if ($errors->has('selectServiceCategories'))
                  <span class="text-danger">{{ $errors->first('selectServiceCategories') }}</span>
              @endif
              
            </div>
            </div>
            <div class="select-gender select-service">
              <h4> Select Service</h4>
              <div class="select-genger--grid">

             
              <select name="appointment_service" id="appointmen-services" class="select1" size="5" style="display:none">     
              <!--  @foreach($getservice_appointment as $data)      
                       

                <option name="test" value="@if($data->id) {{ $data->id }} @else echo '' @endif" class="">@if($data->title) {{ $data-> title }} @else echo '' @endif</option>  
                @endforeach   -->   
              </select>

              <div class="coll">
                <input type="hidden" id="price" class="post_service_price_agenda" name="post_price" placeholder="Price" value="">
                <input type="text" disabled id="price" class="service_price_agenda" name="price" placeholder="Price" value="">
                  @if ($errors->has('post_price'))
                  <span class="text-danger">{{ $errors->first('price') }}</span>
              @endif

            </div>
            </div>
            </div>
            <div class="select-gender choose-barber">
              <h4> Select staff member</h4>
              <div class="select-genger--grid new-select-flex">
            <select name="selectedstaffMember">
                <option value="">Select any option</option>
             @foreach ($getstaff_appointment as  $getstaff_appointments)
                          
          <option  value="@if($getstaff_appointments->id){{ $getstaff_appointments->id}}@else echo '' @endif"  {{ old('selectedstaffMember') == $getstaff_appointments->id ? 'selected' : '' }}  >@if($getstaff_appointments->first_name) {{ $getstaff_appointments->first_name }} @else echo '' @endif</option>

              @endforeach
              </select>
               @if ($errors->has('selectedstaffMember'))
                  <span class="text-danger">{{ $errors->first('selectedstaffMember') }}</span>
              @endif
            </div>
            </div>

         
            <div class="total-amount-bottom">
              <div class="amount-flex-block">
                <h4>Total Amount : <span>€ <span id="service_price_agenda_total">11.98</span></span></h4>
                <button type="Submit" name="submit" class="submitNewAppointment">Submit </button>
              </div>
            </div>
          
    </div>
  </div>
  
</form>
</div>

  @endsection
