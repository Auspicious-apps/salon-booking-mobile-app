

@extends('layout-user.app')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">

             @foreach($result as $data)
            <h1 class="m-0">Agenda {{ $data->salon_name}}</h1> 
             <div  class="date-new-butn-flex">                                                                                             
            <div class="date-timing-block">
                <input type="text" id="calender" name="calender" placeholder="Fechas" class="input__item">
                <button  id ="test">
                Seleccione

                </button>
            </div>
                     <div class="appoinment">
                        <a href="{{ url('salon-new-appointment') }}"><img src="https://www.mi-salon.es/public/salon_images/plus.png">Nueva cita</a>
                    </div>
                  </div>
  @endforeach
           

            <!-- <div id="datepicker"></div> -->
          
          
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
     
    </div>
    <!--<div class="submit_section">-->
    <!--    <div class="date">-->
    <!--      <form>-->
    <!--      <input type="date" id="calender" name="calender">-->
    <!--      <input type="submit">-->
    <!--    </form>-->
    <!--  </div>-->
    <!--  <div class="appoinment">-->
    <!--    <a href="servicepage.html"><img src="dist/img/plus.png">New Appointment</a>-->
    <!--  </div>-->
    <!--</div>-->
    <div class="metting-schedule salon-timing-block">
      <!-- <div class="grid-1 white">
        <h3 class="heading blue">Time</h3>
         <ul class="timming">           
            <li>10:00</li>
            <li>10:15</li>
            <li>10:30</li>
            <li>10:45</li>
            <li>11:00</li>
            <li>11:15</li>
            <li>11:30</li>
            <li>11:45</li>
            <li>12:00</li>
            <li>12:15</li>
            <li>12:30</li>
            <li>12:45</li>
            <li>13:00</li>
          </ul> 
      </div>  --> 
    
    @if(!empty($getStaffMember)) 
    @foreach($getStaffMember as $data)

       <div class="grid-2 white">

      
    
    @php
      $my_appointment = App\Appointment::where('staff_id',$data->id)->where('date',$date)->orderBy('start_time','asc')->get();
    @endphp

         <h3 class="heading" style="background-color:{{ $data->color }};"> @if(!empty($data->first_name)) {{ $data->first_name }} @endif</h3>
         @foreach($my_appointment as $app)

          @if($app->status!=0)


         @php
           $customer_data = App\User::where('id',$app->customer_id)->first();
         @endphp
         <div class="otherPages" data-modal="{{$app->start_time}}">
          <div class="block1  h-30 border show-modal" style="background-color: {{ $data->color }}">
            <div class="top">
              <h5>@if(!empty($customer_data->first_name)) {{ $customer_data->first_name }} @else {{ $app->first_name }}  @endif   @if(!empty($customer_data->last_name)) {{ $app->last_name }} @else @endif</h5>
              <p>@php
                  $service_data = App\SalonTreatment::where('id',$app->services_taken)->first();
                 @endphp

                   @if(!empty($service_data->treatment_name)) {{ $service_data->treatment_name }} @else @endif  
              </p>
            </div>
            <div class="bottom">    
              <h6>Booking Date: @if(!empty($app->date)) {{  $app->date }} @else @endif  </h6>
              <h6>Booking Time:  @if(!empty($app->start_time)) {{ date('g:i', strtotime($app->start_time)) }} @else @endif </h6>
            </div>
         </div> 
       </div>


       <div id="{{$app->start_time}}" class="modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header header-top">
              <div class="top-header">   
                <img src="{{ asset('public/staff_images/'.$data->image) }}">
                <div class="pop-img-text">
                  <h3>@if(!empty($data->first_name)) {{ $data->first_name }} @else @endif</h3>
                   </div> 
                </div>
                
                <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
               
              </div>
              <div class="modal-body header-top">
                <h2 class="details">Detalles de las citas</h2>

                <div class="detail-grid detail-new-grid">

             <ul class="main-name">
                                                          
               <li><span>Customer Name </span><span>@if(!empty($customer_data->first_name)) {{ $customer_data->first_name }} @else {{ $app->first_name }} @endif @if(!empty($customer_data->last_name)) {{ $customer_data->last_name }} @else {{ $app->last_name }} @endif</span></li>
               
               </ul>


              <ul class="main-name">
                <li>Services</li>
                <ul class="sub-name">
               <li><span> @if(!empty($service_data->treatment_name)) {{ $service_data->treatment_name }} @else @endif </span><span>@if(!empty($app->total_cost)) {{ $app->total_cost }} @else @endif</span></li>
               <li><span>Total Cost </span><span>@if(!empty($app->total_cost)) {{ $app->total_cost }} @else @endif</span></li>
             </ul>
               </ul>
             <ul class="main-name">
               <li><span>Phone Number</span><span>@if(!empty($app->phone)) {{ $app->phone }} @else @endif</span></li>
                  <li><span>Email Address</span><span>@if(!empty($app->email)) {{ $app->email }} @else @endif</span></li>
               </ul>
                </div>

          
              </div>
          
            </div>
          </div>
        </div>

        @endif
       @endforeach
       
      </div>
   
        @endforeach

    @endif
    <!-- /.content-header -->

    <!-- Main content -->
   
    <!-- /.content -->
  </div>

  @endsection
  <style>
    h5::first-letter{
      font-size: 20px;
    }
  </style>
